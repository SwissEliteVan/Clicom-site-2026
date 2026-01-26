<?php
/**
 * CLICOM - Automatisations & Cron
 * Fichier: cron.php
 * 
 * À configurer dans le Cron Manager Hostinger:
 * - Fréquence: Tous les jours à 08:55
 * - Commande: php /home/username/public_html/cron.php
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

// Sécurité: autoriser l'exécution uniquement en CLI ou avec clé secrète
if (php_sapi_name() !== 'cli') {
    $secret_key = $_GET['key'] ?? '';
    $expected_key = hash('sha256', APP_SALT . 'cron');
    
    if ($secret_key !== $expected_key) {
        http_response_code(403);
        die('Accès interdit. Utilisez: ?key=' . $expected_key);
    }
}

echo "[" . date('Y-m-d H:i:s') . "] Cron CLICOM démarré\n";

$db = getDB();

// =================================================
// 1. RELANCE FACTURES IMPAYÉES (J+10)
// =================================================

echo "→ Vérification des factures impayées...\n";

$overdue_invoices = $db->query("
    SELECT * FROM invoices 
    WHERE status = 'sent' 
    AND due_date < DATE_SUB(NOW(), INTERVAL 10 DAY)
")->fetchAll();

foreach ($overdue_invoices as $invoice) {
    // Changer le statut en overdue
    $update_stmt = $db->prepare("UPDATE invoices SET status = 'overdue' WHERE id = ?");
    $update_stmt->execute([$invoice['id']]);
    
    // Créer une tâche de relance
    $task_sql = "INSERT INTO tasks (title, description, priority, status, due_date, client_id, created_at) 
                 VALUES (?, ?, 'high', 'pending', NOW(), ?, NOW())";
    
    $task_stmt = $db->prepare($task_sql);
    $task_stmt->execute([
        "Relancer client pour facture impayée - {$invoice['invoice_number']}",
        "Facture: {$invoice['invoice_number']}\nMontant: {$invoice['total_amount']} CHF\nÉchéance dépassée depuis 10 jours.",
        $invoice['client_id']
    ]);
    
    echo "  ✓ Facture {$invoice['invoice_number']} marquée 'overdue' et tâche créée\n";
}

echo "  Total factures traitées: " . count($overdue_invoices) . "\n";

// =================================================
// 2. RELANCE DEVIS SANS RÉPONSE (J+7)
// =================================================

echo "→ Vérification des devis sans réponse...\n";

$pending_quotes = $db->query("
    SELECT * FROM quotes 
    WHERE status = 'sent' 
    AND created_at < DATE_SUB(NOW(), INTERVAL 7 DAY)
")->fetchAll();

foreach ($pending_quotes as $quote) {
    // Créer une tâche de suivi
    $task_sql = "INSERT INTO tasks (title, description, priority, status, due_date, client_id, created_at) 
                 VALUES (?, ?, 'medium', 'pending', NOW(), ?, NOW())";
    
    $task_stmt = $db->prepare($task_sql);
    $task_stmt->execute([
        "Relancer client pour devis - {$quote['quote_number']}",
        "Devis envoyé il y a 7 jours sans réponse.\nDevis: {$quote['quote_number']}\nMontant: {$quote['total_amount']} CHF",
        $quote['client_id']
    ]);
    
    echo "  ✓ Tâche de suivi créée pour devis {$quote['quote_number']}\n";
}

echo "  Total devis traités: " . count($pending_quotes) . "\n";

// =================================================
// 3. EXPIRATION DES DEVIS (valid_until dépassé)
// =================================================

echo "→ Expiration des devis...\n";

$expired_count = $db->exec("
    UPDATE quotes 
    SET status = 'expired' 
    WHERE status = 'sent' 
    AND valid_until IS NOT NULL 
    AND valid_until < CURDATE()
");

echo "  Total devis expirés: $expired_count\n";

// =================================================
// 4. NETTOYAGE DES TOKENS EXPIRÉS
// =================================================

echo "→ Nettoyage des tokens portail expirés...\n";

$deleted_tokens = $db->exec("
    DELETE FROM portal_tokens 
    WHERE expires_at < NOW()
");

echo "  Total tokens supprimés: $deleted_tokens\n";

// =================================================
// 5. STATISTIQUES
// =================================================

echo "→ Génération des statistiques...\n";

$stats = [
    'clients_total' => $db->query("SELECT COUNT(*) FROM clients")->fetchColumn(),
    'quotes_pending' => $db->query("SELECT COUNT(*) FROM quotes WHERE status IN ('draft', 'sent')")->fetchColumn(),
    'invoices_unpaid' => $db->query("SELECT COUNT(*) FROM invoices WHERE status IN ('sent', 'overdue')")->fetchColumn(),
    'projects_active' => $db->query("SELECT COUNT(*) FROM projects WHERE status = 'active'")->fetchColumn(),
    'revenue_month' => $db->query("SELECT COALESCE(SUM(total_amount), 0) FROM invoices WHERE status = 'paid' AND MONTH(paid_date) = MONTH(NOW())")->fetchColumn()
];

echo "  Clients: {$stats['clients_total']}\n";
echo "  Devis en attente: {$stats['quotes_pending']}\n";
echo "  Factures impayées: {$stats['invoices_unpaid']}\n";
echo "  Projets actifs: {$stats['projects_active']}\n";
echo "  CA du mois: " . format_money($stats['revenue_month']) . "\n";

// =================================================
// FIN
// =================================================

echo "[" . date('Y-m-d H:i:s') . "] Cron terminé avec succès\n";
echo str_repeat("=", 50) . "\n";

// Log dans un fichier
$log_content = ob_get_contents();
@file_put_contents(STORAGE_PATH . '/logs/cron.log', $log_content, FILE_APPEND);
