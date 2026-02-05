<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db_connect.php';

// Vérifier si l'ID de la facture est fourni
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID de facture invalide.");
}

$invoiceId = (int)$_GET['id'];
$db = getDB();

// Mettre à jour le statut de la facture
$stmt = $db->prepare("UPDATE invoices SET status = 'paid', paid_date = CURDATE() WHERE id = ?");
$stmt->execute([$invoiceId]);

// Rediriger vers la liste des factures
header("Location: invoices.php");
exit();
?>