<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/includes/admin_layout.php';

// Vérifier si l'ID du devis est fourni
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID de devis invalide.");
}

$quoteId = (int)$_GET['id'];
$db = getDB();

// Récupérer le devis
$stmt = $db->prepare("SELECT * FROM quotes WHERE id = ?");
$stmt->execute([$quoteId]);
$quote = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérifier si le devis existe et n'est pas déjà facturé
if (!$quote) {
    die("Devis introuvable.");
}
if ($quote['status'] === 'invoiced') {
    die("Ce devis a déjà été facturé.");
}

// Générer le numéro de facture séquentiel
$currentYear = date('Y');
$stmt = $db->query("SELECT MAX(CAST(SUBSTRING_INDEX(reference, '-', -1) AS UNSIGNED)) AS last_num FROM invoices WHERE reference LIKE 'FAC-$currentYear-%'");
$lastNum = $stmt->fetchColumn();
$invoiceNum = $lastNum ? $lastNum + 1 : 1;
$invoiceRef = "FAC-$currentYear-" . str_pad($invoiceNum, 3, '0', STR_PAD_LEFT);

// Calculer la date d'échéance (30 jours)
$dueDate = date('Y-m-d', strtotime('+30 days'));

// Créer la facture
$invoiceData = [
    'reference' => $invoiceRef,
    'client_id' => $quote['client_id'],
    'quote_id' => $quoteId,
    'date' => date('Y-m-d'),
    'due_date' => $dueDate,
    'items' => $quote['items'], // Données JSON des lignes
    'total_ht' => $quote['total_ht'],
    'tva_rate' => 8.1,
    'total_ttc' => $quote['total_ttc'],
    'status' => 'pending',
    'token' => bin2hex(random_bytes(16)) // Token sécurisé
];

$columns = implode(', ', array_keys($invoiceData));
$values = ':' . implode(', :', array_keys($invoiceData));
$stmt = $db->prepare("INSERT INTO invoices ($columns) VALUES ($values)");
$stmt->execute($invoiceData);
$invoiceId = $db->lastInsertId();

// Mettre à jour le statut du devis
$db->prepare("UPDATE quotes SET status = 'invoiced' WHERE id = ?")->execute([$quoteId]);

// Rediriger vers la nouvelle facture
header("Location: invoice_view.php?id=$invoiceId");
exit();
?>