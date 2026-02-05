<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db_connect.php';

// Vérifier le token
if (!isset($_GET['token'])) {
    http_response_code(403);
    die("Accès refusé. Token requis.");
}

$token = $_GET['token'];
$db = getDB();
$stmt = $db->prepare("SELECT * FROM invoices WHERE token = ?");
$stmt->execute([$token]);
$invoice = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$invoice) {
    http_response_code(403);
    die("Token invalide ou facture introuvable.");
}

// Récupérer les informations client
$clientStmt = $db->prepare("SELECT * FROM clients WHERE id = ?");
$clientStmt->execute([$invoice['client_id']]);
$client = $clientStmt->fetch(PDO::FETCH_ASSOC);

// Récupérer les items de la facture
$itemsStmt = $db->prepare("SELECT * FROM invoice_items WHERE invoice_id = ?");
$itemsStmt->execute([$invoice['id']]);
$items = $itemsStmt->fetchAll(PDO::FETCH_ASSOC);

// Calculer le total
$subtotal = 0;
foreach ($items as $item) {
    $subtotal += $item['total_price'];
}
$vatAmount = $subtotal * ($invoice['vat_rate'] / 100);
$totalAmount = $subtotal + $vatAmount;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture <?= $invoice['invoice_number'] ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .header { display: flex; justify-content: space-between; margin-bottom: 30px; }
        .logo { width: 150px; }
        .info-section { display: flex; justify-content: space-between; margin-bottom: 30px; }
        .issuer, .client { width: 45%; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .totals { margin-left: auto; width: 300px; }
        .footer { margin-top: 50px; text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <img src="<?= BASE_URL ?>/assets/img/logo.png" alt="CLICOM Logo" class="logo">
        <h1>Facture N° <?= $invoice['invoice_number'] ?></h1>
    </div>

    <div class="info-section">
        <div class="issuer">
            <h3>Émetteur</h3>
            <p>CLICOM Studio</p>
            <p>Rue de Lausanne 45, 1700 Fribourg</p>
            <p>contact@clicom.ch</p>
        </div>
        <div class="client">
            <h3>Destinataire</h3>
            <p><?= htmlspecialchars($client['name']) ?></p>
            <p><?= htmlspecialchars($client['address']) ?></p>
            <p><?= htmlspecialchars($client['email']) ?></p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Prestation</th>
                <th>Quantité</th>
                <th>Prix unitaire (CHF)</th>
                <th>Total (CHF)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['service_name']) ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= number_format($item['unit_price'], 2) ?></td>
                    <td><?= number_format($item['total_price'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="totals">
        <p>Sous-total: CHF <?= number_format($subtotal, 2) ?></p>
        <p>TVA (<?= $invoice['vat_rate'] ?>%): CHF <?= number_format($vatAmount, 2) ?></p>
        <p><strong>Total TTC: CHF <?= number_format($totalAmount, 2) ?></strong></p>
    </div>

    <div class="footer">
        <p>Merci de payer avant le : <?= date('d.m.Y', strtotime($invoice['due_date'])) ?></p>
        <p>IBAN Suisse : CH50 0900 0000 0000 0000 0</p>
        <p><em>Cette facture est payable net, sans escompte.</em></p>
    </div>
</body>
</html>