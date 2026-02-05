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
$stmt = $db->query("SELECT MAX(CAST(SUBSTRING_INDEX(invoice_number, '-', -1) AS UNSIGNED)) AS last_num FROM invoices WHERE invoice_number LIKE 'FAC-$currentYear-%'");
$lastNum = $stmt->fetchColumn();
$invoiceNum = $lastNum ? $lastNum + 1 : 1;
$invoiceNumber = "FAC-$currentYear-" . str_pad($invoiceNum, 3, '0', STR_PAD_LEFT);

// Calculer la date d'échéance (30 jours)
$dueDate = date('Y-m-d', strtotime('+30 days'));

// Créer la facture
$invoiceData = [
    'invoice_number' => $invoiceNumber,
    'client_id' => $quote['client_id'],
    'quote_id' => $quoteId,
    'issue_date' => date('Y-m-d'),
    'due_date' => $dueDate,
    'total_amount' => $quote['total_amount'],
    'status' => 'draft',
    'token' => bin2hex(random_bytes(16)) // Token sécurisé
];

$columns = implode(', ', array_keys($invoiceData));
$values = ':' . implode(', :', array_keys($invoiceData));
$stmt = $db->prepare("INSERT INTO invoices ($columns) VALUES ($values)");
$stmt->execute($invoiceData);
$invoiceId = $db->lastInsertId();

// Copier les items du devis vers la facture
$stmt = $db->prepare("SELECT * FROM quote_items WHERE quote_id = ?");
$stmt->execute([$quoteId]);
$quoteItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($quoteItems as $item) {
    $itemData = [
        'invoice_id' => $invoiceId,
        'service_name' => $item['service_name'],
        'description' => $item['description'],
        'quantity' => $item['quantity'],
        'unit_price' => $item['unit_price'],
        'total_price' => $item['total_price']
    ];
    
    $columns = implode(', ', array_keys($itemData));
    $values = ':' . implode(', :', array_keys($itemData));
    $stmt = $db->prepare("INSERT INTO invoice_items ($columns) VALUES ($values)");
    $stmt->execute($itemData);
}

// Mettre à jour le statut du devis
$db->prepare("UPDATE quotes SET status = 'invoiced' WHERE id = ?")->execute([$quoteId]);

// Rediriger vers la nouvelle facture
header("Location: invoice_view.php?id=$invoiceId");
exit();
?>