<?php
/**
 * CLICOM - Gestion des Devis
 * Fichier: crm/quotes.php
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

init_session();
require_login();

$user = current_user();

// Récupération de tous les devis avec jointure sur les clients
$db = getDB();
$stmt = $db->query("
    SELECT 
        q.*,
        c.company_name as client_company,
        c.contact_name as client_contact
    FROM quotes q
    LEFT JOIN clients c ON q.client_id = c.id
    ORDER BY q.created_at DESC
");
$quotes = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devis - CLICOM CRM</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            background: var(--color-text);
            color: white;
            padding: 2rem 1rem;
        }
        
        .content {
            margin-left: 250px;
            padding: 2rem;
        }
        
        .sidebar-link {
            display: block;
            padding: 0.75rem 1rem;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            border-radius: var(--radius-md);
            margin-bottom: 0.5rem;
            transition: all var(--transition-fast);
        }
        
        .sidebar-link:hover {
            background: rgba(255,255,255,0.1);
            color: white;
        }
        
        .sidebar-link.active {
            background: var(--color-primary);
            color: white;
        }
        
        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: var(--radius-full);
            font-size: 0.875rem;
            font-weight: 600;
        }
        
        .badge.draft {
            background: rgba(107, 114, 128, 0.1);
            color: var(--color-muted);
        }
        
        .badge.sent {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
        }
        
        .badge.accepted {
            background: rgba(16, 185, 129, 0.1);
            color: var(--color-success);
        }
        
        .badge.rejected {
            background: rgba(239, 68, 68, 0.1);
            color: var(--color-error);
        }
        
        .badge.expired {
            background: rgba(245, 158, 11, 0.1);
            color: var(--color-warning);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem;">
            <div style="width: 40px; height: 40px; background: var(--color-primary); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; font-weight: 700;">
                C
            </div>
            <span style="font-size: 1.25rem; font-weight: 600;">CLICOM CRM</span>
        </div>
        
        <nav>
            <a href="/crm/index.php" class="sidebar-link">📊 Dashboard</a>
            <a href="/crm/clients.php" class="sidebar-link">👥 Clients</a>
            <a href="/crm/quotes.php" class="sidebar-link active">📄 Devis</a>
            <a href="/crm/invoices.php" class="sidebar-link">💰 Factures</a>
            <a href="/crm/projects.php" class="sidebar-link">🚀 Projets</a>
            <a href="/crm/tasks.php" class="sidebar-link">✅ Tâches</a>
            <hr style="margin: 1.5rem 0; border-color: rgba(255,255,255,0.1);">
            <a href="/crm/settings.php" class="sidebar-link">⚙️ Paramètres</a>
            <a href="/crm/logout.php" class="sidebar-link">🚪 Déconnexion</a>
        </nav>
        
        <div style="position: absolute; bottom: 1rem; left: 1rem; right: 1rem; padding: 1rem; background: rgba(255,255,255,0.05); border-radius: var(--radius-md); font-size: 0.875rem;">
            <div style="color: rgba(255,255,255,0.6);">Connecté en tant que</div>
            <div style="font-weight: 600;"><?= h($user['username']) ?></div>
        </div>
    </div>
    
    <!-- Contenu principal -->
    <div class="content">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <div>
                <h1>Devis</h1>
                <p class="text-muted">Gérez vos propositions commerciales</p>
            </div>
            <button class="btn btn-primary">+ Nouveau devis</button>
        </div>
        
        <!-- Filtres rapides -->
        <div style="display: flex; gap: 1rem; margin-bottom: 2rem; flex-wrap: wrap;">
            <button class="btn btn-sm btn-primary">Tous (<?= count($quotes) ?>)</button>
            <button class="btn btn-sm">
                Brouillon (<?= count(array_filter($quotes, fn($q) => $q['status'] === 'draft')) ?>)
            </button>
            <button class="btn btn-sm">
                Envoyés (<?= count(array_filter($quotes, fn($q) => $q['status'] === 'sent')) ?>)
            </button>
            <button class="btn btn-sm">
                Acceptés (<?= count(array_filter($quotes, fn($q) => $q['status'] === 'accepted')) ?>)
            </button>
        </div>
        
        <!-- Tableau des devis -->
        <div class="card">
            <div style="overflow-x: auto;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>N° Devis</th>
                            <th>Client</th>
                            <th>Date émission</th>
                            <th>Montant HT</th>
                            <th>Montant TTC</th>
                            <th>Statut</th>
                            <th>Validité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($quotes)): ?>
                            <tr>
                                <td colspan="8" style="text-align: center; padding: 3rem; color: var(--color-muted);">
                                    Aucun devis enregistré pour le moment.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($quotes as $quote): ?>
                                <tr>
                                    <td>
                                        <strong><?= h($quote['quote_number']) ?></strong>
                                    </td>
                                    <td>
                                        <div><?= h($quote['client_company'] ?? 'Client inconnu') ?></div>
                                        <div class="text-muted" style="font-size: 0.875rem;">
                                            <?= h($quote['client_contact'] ?? '') ?>
                                        </div>
                                    </td>
                                    <td>
                                        <?= date('d/m/Y', strtotime($quote['created_at'])) ?>
                                    </td>
                                    <td>
                                        <strong><?= number_format($quote['total_ht'], 2, '.', '\'') ?> CHF</strong>
                                    </td>
                                    <td>
                                        <strong><?= number_format($quote['total_ttc'], 2, '.', '\'') ?> CHF</strong>
                                    </td>
                                    <td>
                                        <?php 
                                        $status = $quote['status'] ?? 'draft';
                                        $badge_class = 'badge ' . $status;
                                        $status_labels = [
                                            'draft' => 'Brouillon',
                                            'sent' => 'Envoyé',
                                            'accepted' => 'Accepté',
                                            'rejected' => 'Refusé',
                                            'expired' => 'Expiré'
                                        ];
                                        ?>
                                        <span class="<?= $badge_class ?>">
                                            <?= $status_labels[$status] ?? ucfirst($status) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if ($quote['valid_until']): ?>
                                            <?php 
                                            $valid_date = strtotime($quote['valid_until']);
                                            $is_expired = $valid_date < time();
                                            ?>
                                            <span style="color: <?= $is_expired ? 'var(--color-error)' : 'inherit' ?>;">
                                                <?= date('d/m/Y', $valid_date) ?>
                                                <?= $is_expired ? '⚠️' : '' ?>
                                            </span>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm" onclick="viewQuote(<?= $quote['id'] ?>)">
                                            📄 Détails
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Statistiques en bas -->
        <div style="margin-top: 2rem; padding: 1.5rem; background: var(--color-bg); border-radius: var(--radius-lg);">
            <div class="grid grid-4">
                <div>
                    <div class="text-muted" style="font-size: 0.875rem;">Total devis</div>
                    <div style="font-size: 1.5rem; font-weight: 700;"><?= count($quotes) ?></div>
                </div>
                <div>
                    <div class="text-muted" style="font-size: 0.875rem;">Montant total (TTC)</div>
                    <div style="font-size: 1.5rem; font-weight: 700;">
                        <?= number_format(array_sum(array_column($quotes, 'total_ttc')), 0, '.', '\'') ?> CHF
                    </div>
                </div>
                <div>
                    <div class="text-muted" style="font-size: 0.875rem;">Taux acceptation</div>
                    <div style="font-size: 1.5rem; font-weight: 700;">
                        <?php 
                        $accepted = count(array_filter($quotes, fn($q) => $q['status'] === 'accepted'));
                        $total = count($quotes);
                        $rate = $total > 0 ? round(($accepted / $total) * 100) : 0;
                        ?>
                        <?= $rate ?>%
                    </div>
                </div>
                <div>
                    <div class="text-muted" style="font-size: 0.875rem;">En attente</div>
                    <div style="font-size: 1.5rem; font-weight: 700;">
                        <?= count(array_filter($quotes, fn($q) => in_array($q['status'], ['draft', 'sent']))) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function viewQuote(quoteId) {
            // TODO: Rediriger vers la page de détails du devis
            alert('Détails du devis #' + quoteId + ' (page à créer)');
            // window.location.href = '/crm/quote_view.php?id=' + quoteId;
        }
    </script>
</body>
</html>
