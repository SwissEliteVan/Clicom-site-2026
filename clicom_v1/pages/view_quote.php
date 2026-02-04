<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../includes/functions.php';

// Vérifier le token
if (!isset($_GET['token'])) {
    header('HTTP/1.1 404 Not Found');
    exit('Token non fourni');
}

$token = $_GET['token'];
$db = getDB();

// Récupérer le devis avec token
$stmt = $db->prepare("SELECT * FROM quotes WHERE token = ?");
$stmt->execute([$token]);
$quote = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$quote) {
    header('HTTP/1.1 404 Not Found');
    exit('Devis introuvable');
}

// Récupérer les items du devis
$itemsStmt = $db->prepare("SELECT description, quantity, unit_price FROM quote_items WHERE quote_id = ?");
$itemsStmt->execute([$quote['id']]);
$items = $itemsStmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les infos client
$clientStmt = $db->prepare("SELECT * FROM clients WHERE id = ?");
$clientStmt->execute([$quote['client_id']]);
$client = $clientStmt->fetch(PDO::FETCH_ASSOC);

// Mettre à jour le statut si le client accepte
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accept'])) {
    $updateStmt = $db->prepare("UPDATE quotes SET status = 'accepted' WHERE id = ?");
    $updateStmt->execute([$quote['id']]);
    
    // Envoyer une notification à l'admin
    $adminEmail = 'contact@clicom.ch';
    $subject = "Devis #{$quote['reference']} accepté";
    $message = "Le client {$client['name']} a accepté le devis #{$quote['reference']}.";
    
    if (SMTP_ENABLED) {
        // Envoyer via SMTP (implémentation réelle requiert PHPMailer ou similaire)
    } else {
        // Envoyer un email basique
        mail($adminEmail, $subject, $message);
    }
    
    // Rediriger avec message de succès
    $_SESSION['success'] = "Devis accepté avec succès! L'équipe CLICOM vous contactera bientôt.";
    header("Location: view_quote.php?token=$token");
    exit;
}

// Déterminer le statut
$statusLabels = [
    'draft' => 'Brouillon',
    'sent' => 'Envoyé',
    'accepted' => 'Accepté',
    'invoiced' => 'Facturé'
];

$statusClass = [
    'draft' => 'text-secondary',
    'sent' => 'text-primary',
    'accepted' => 'text-success',
    'invoiced' => 'text-purple'
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devis <?= $quote['reference'] ?> - CLICOM</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
    <style>
        .quote-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background: white;
        }
        .quote-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .quote-logo {
            max-height: 80px;
            margin-bottom: 1rem;
        }
        .quote-status {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .quote-details {
            margin-bottom: 2rem;
        }
        .quote-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
        }
        .quote-table th, .quote-table td {
            padding: 0.75rem;
            border: 1px solid #dee2e6;
            text-align: left;
        }
        .quote-table th {
            background-color: #f8f9fa;
        }
        .quote-totals {
            margin-left: auto;
            width: 300px;
        }
        .accept-btn {
            display: block;
            width: 100%;
            padding: 1rem;
            font-size: 1.2rem;
            font-weight: bold;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
        }
        .accept-btn:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
        }
        .text-purple {
            color: #6f42c1;
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>

    <div class="quote-container">
        <div class="quote-header">
            <img src="<?= BASE_URL ?>/assets/img/logo.png" alt="CLICOM Logo" class="quote-logo">
            <h1>Devis <?= $quote['reference'] ?></h1>
            <div class="quote-status <?= $statusClass[$quote['status']] ?>">
                Statut: <?= $statusLabels[$quote['status']] ?>
            </div>
        </div>

        <div class="quote-details">
            <div class="row">
                <div class="col-md-6">
                    <h3>CLICOM Studio</h3>
                    <p>
                        Rue du Centre 25<br>
                        1260 Nyon<br>
                        Suisse
                    </p>
                </div>
                <div class="col-md-6">
                    <h3>Client</h3>
                    <p>
                        <?= htmlspecialchars($client['name']) ?><br>
                        <?= htmlspecialchars($client['address']) ?><br>
                        <?= htmlspecialchars($client['zip']) ?> <?= htmlspecialchars($client['city']) ?><br>
                        <?= htmlspecialchars($client['country']) ?>
                    </p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <p><strong>Date du devis:</strong> <?= date('d.m.Y', strtotime($quote['date'])) ?></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Date de validité:</strong> <?= date('d.m.Y', strtotime($quote['valid_until'])) ?></p>
                </div>
            </div>
        </div>

        <table class="quote-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($quote['items'] as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['description']) ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td><?= number_format($item['unit_price'], 2) ?> CHF</td>
                        <td><?= number_format($item['quantity'] * $item['unit_price'], 2) ?> CHF</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="quote-totals">
            <table class="quote-table">
                <tr>
                    <th>Sous-total</th>
                    <td><?= number_format($quote['total_ht'], 2) ?> CHF</td>
                </tr>
                <tr>
                    <th>TVA Suisse (8.1%)</th>
                    <td><?= number_format($quote['tva'], 2) ?> CHF</td>
                </tr>
                <tr>
                    <th>Total TTC</th>
                    <td><strong><?= number_format($quote['total_ttc'], 2) ?> CHF</strong></td>
                </tr>
            </table>
        </div>

        <?php if ($quote['status'] === 'sent'): ?>
            <form method="post">
                <button type="submit" name="accept" class="accept-btn">
                    ACCEPTER LE DEVIS
                </button>
            </form>
        <?php elseif ($quote['status'] === 'accepted'): ?>
            <button class="accept-btn" disabled>
                DEVIS DÉJÀ ACCEPTÉ
            </button>
        <?php endif; ?>
    </div>

    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>