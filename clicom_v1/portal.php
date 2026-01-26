<?php
/**
 * CLICOM - Portail Client (Accès Token)
 * Fichier: portal.php
 * URL: https://votresite.com/portal.php?token=XXX
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

$token = $_GET['token'] ?? '';
$error = '';
$client_data = null;

if (empty($token)) {
    $error = 'Token manquant. Veuillez utiliser le lien fourni par email.';
} else {
    $client_data = verify_portal_token($token);
    
    if (!$client_data) {
        $error = 'Token invalide ou expiré.';
    }
}

// Si token valide, récupérer les données du client
if ($client_data) {
    $db = getDB();
    $client_id = $client_data['client_id'];
    
    // Devis
    $quotes = $db->prepare("SELECT * FROM quotes WHERE client_id = ? ORDER BY created_at DESC");
    $quotes->execute([$client_id]);
    $quotes_list = $quotes->fetchAll();
    
    // Factures
    $invoices = $db->prepare("SELECT * FROM invoices WHERE client_id = ? ORDER BY created_at DESC");
    $invoices->execute([$client_id]);
    $invoices_list = $invoices->fetchAll();
    
    // Projets
    $projects = $db->prepare("SELECT * FROM projects WHERE client_id = ? ORDER BY created_at DESC");
    $projects->execute([$client_id]);
    $projects_list = $projects->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portail Client - CLICOM</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <?php if ($error): ?>
        <div class="container section text-center">
            <div style="max-width: 500px; margin: 0 auto;">
                <div style="font-size: 4rem; margin-bottom: 1rem;">🔒</div>
                <h1>Accès refusé</h1>
                <p class="text-muted"><?= h($error) ?></p>
                <a href="/" class="btn btn-primary mt-lg">Retour à l'accueil</a>
            </div>
        </div>
    <?php else: ?>
        <header class="header">
            <div class="container">
                <nav class="nav">
                    <a href="/" class="nav-logo">
                        <div class="nav-logo-icon">C</div>
                        <span>CLICOM</span>
                    </a>
                    <div style="color: var(--color-text-muted);">
                        Portail Client - <?= h($client_data['company_name']) ?>
                    </div>
                </nav>
            </div>
        </header>
        
        <main class="container section">
            <div class="mb-lg">
                <h1>Bienvenue, <?= h($client_data['company_name']) ?></h1>
                <p class="text-muted">Retrouvez ici tous vos documents et projets</p>
            </div>
            
            <!-- Devis -->
            <section class="mb-lg">
                <h2 class="mb-md">Vos Devis</h2>
                
                <?php if (empty($quotes_list)): ?>
                    <p class="text-muted">Aucun devis pour le moment.</p>
                <?php else: ?>
                    <div class="grid grid-2">
                        <?php foreach ($quotes_list as $quote): ?>
                            <div class="card">
                                <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                                    <div>
                                        <strong><?= h($quote['quote_number']) ?></strong><br>
                                        <small class="text-muted"><?= format_date($quote['created_at']) ?></small>
                                    </div>
                                    <span style="padding: 0.25rem 0.75rem; background: rgba(51, 102, 255, 0.1); color: var(--color-primary); border-radius: var(--radius-full); font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                                        <?= h($quote['status']) ?>
                                    </span>
                                </div>
                                
                                <h4><?= h($quote['title']) ?></h4>
                                <p class="text-muted"><?= nl2br(h(substr($quote['description'] ?? '', 0, 150))) ?>...</p>
                                
                                <div style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid var(--color-border); display: flex; justify-content: space-between; align-items: center;">
                                    <strong style="font-size: 1.25rem; color: var(--color-primary);">
                                        <?= format_money($quote['total_amount']) ?>
                                    </strong>
                                    
                                    <?php if ($quote['status'] === 'sent'): ?>
                                        <a href="/crm/quote-accept.php?id=<?= $quote['id'] ?>&token=<?= $token ?>" class="btn btn-primary btn-sm">
                                            Accepter →
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>
            
            <!-- Factures -->
            <section class="mb-lg">
                <h2 class="mb-md">Vos Factures</h2>
                
                <?php if (empty($invoices_list)): ?>
                    <p class="text-muted">Aucune facture pour le moment.</p>
                <?php else: ?>
                    <div class="card">
                        <table style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr style="border-bottom: 2px solid var(--color-border);">
                                    <th style="text-align: left; padding: 0.75rem;">Numéro</th>
                                    <th style="text-align: left; padding: 0.75rem;">Date</th>
                                    <th style="text-align: left; padding: 0.75rem;">Montant</th>
                                    <th style="text-align: left; padding: 0.75rem;">Statut</th>
                                    <th style="text-align: left; padding: 0.75rem;">Échéance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($invoices_list as $invoice): ?>
                                    <tr style="border-bottom: 1px solid var(--color-border);">
                                        <td style="padding: 0.75rem;"><?= h($invoice['invoice_number']) ?></td>
                                        <td style="padding: 0.75rem;"><?= format_date($invoice['issue_date']) ?></td>
                                        <td style="padding: 0.75rem;"><strong><?= format_money($invoice['total_amount']) ?></strong></td>
                                        <td style="padding: 0.75rem;">
                                            <?php
                                            $status_colors = [
                                                'paid' => 'success',
                                                'sent' => 'primary',
                                                'overdue' => 'error',
                                                'draft' => 'muted'
                                            ];
                                            $color_class = $status_colors[$invoice['status']] ?? 'muted';
                                            ?>
                                            <span style="padding: 0.25rem 0.5rem; background: rgba(51, 102, 255, 0.1); color: var(--color-<?= $color_class ?>); border-radius: var(--radius-sm); font-size: 0.75rem; font-weight: 600;">
                                                <?= h($invoice['status']) ?>
                                            </span>
                                        </td>
                                        <td style="padding: 0.75rem;"><?= format_date($invoice['due_date']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </section>
            
            <!-- Projets -->
            <section>
                <h2 class="mb-md">Vos Projets</h2>
                
                <?php if (empty($projects_list)): ?>
                    <p class="text-muted">Aucun projet en cours.</p>
                <?php else: ?>
                    <div class="grid grid-2">
                        <?php foreach ($projects_list as $project): ?>
                            <div class="card">
                                <h3><?= h($project['project_name']) ?></h3>
                                <p class="text-muted"><?= nl2br(h($project['description'] ?? '')) ?></p>
                                
                                <div style="margin-top: 1rem; display: flex; gap: 1rem; align-items: center;">
                                    <div>
                                        <small class="text-muted">Phase</small><br>
                                        <strong style="text-transform: capitalize;"><?= h($project['phase']) ?></strong>
                                    </div>
                                    <div>
                                        <small class="text-muted">Statut</small><br>
                                        <strong style="text-transform: capitalize;"><?= h($project['status']) ?></strong>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>
        </main>
        
        <footer class="footer">
            <div class="container text-center">
                <p>© <?= date('Y') ?> CLICOM. Tous droits réservés.</p>
            </div>
        </footer>
    <?php endif; ?>
</body>
</html>
