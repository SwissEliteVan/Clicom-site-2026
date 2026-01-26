<?php
/**
 * CLICOM - Gestion des Clients
 * Fichier: crm/clients.php
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

init_session();
require_login();

$user = current_user();

// Récupération de tous les clients
$db = getDB();
$stmt = $db->query("SELECT * FROM clients ORDER BY created_at DESC");
$clients = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients - CLICOM CRM</title>
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
        
        .badge.active {
            background: rgba(16, 185, 129, 0.1);
            color: var(--color-success);
        }
        
        .badge.inactive {
            background: rgba(107, 114, 128, 0.1);
            color: var(--color-muted);
        }
        
        .badge.lead {
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
            <a href="/crm/clients.php" class="sidebar-link active">👥 Clients</a>
            <a href="/crm/quotes.php" class="sidebar-link">📄 Devis</a>
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
                <h1>Clients</h1>
                <p class="text-muted">Gérez votre portefeuille clients</p>
            </div>
            <button class="btn btn-primary">+ Nouveau client</button>
        </div>
        
        <!-- Tableau des clients -->
        <div class="card">
            <div style="overflow-x: auto;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Entreprise</th>
                            <th>Nom Contact</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Statut</th>
                            <th>Date création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($clients)): ?>
                            <tr>
                                <td colspan="7" style="text-align: center; padding: 3rem; color: var(--color-muted);">
                                    Aucun client enregistré pour le moment.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($clients as $client): ?>
                                <tr>
                                    <td>
                                        <strong><?= h($client['company_name']) ?></strong>
                                    </td>
                                    <td><?= h($client['contact_name']) ?></td>
                                    <td>
                                        <a href="mailto:<?= h($client['email']) ?>" style="color: var(--color-primary);">
                                            <?= h($client['email']) ?>
                                        </a>
                                    </td>
                                    <td><?= h($client['phone'] ?? '-') ?></td>
                                    <td>
                                        <?php 
                                        $status = $client['status'] ?? 'lead';
                                        $badge_class = 'badge ' . $status;
                                        $status_labels = [
                                            'active' => 'Actif',
                                            'inactive' => 'Inactif',
                                            'lead' => 'Prospect'
                                        ];
                                        ?>
                                        <span class="<?= $badge_class ?>">
                                            <?= $status_labels[$status] ?? ucfirst($status) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?= date('d/m/Y', strtotime($client['created_at'])) ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm" onclick="viewClient(<?= $client['id'] ?>)">
                                            👁️ Voir
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
            <div class="grid grid-3">
                <div>
                    <div class="text-muted" style="font-size: 0.875rem;">Total clients</div>
                    <div style="font-size: 1.5rem; font-weight: 700;"><?= count($clients) ?></div>
                </div>
                <div>
                    <div class="text-muted" style="font-size: 0.875rem;">Clients actifs</div>
                    <div style="font-size: 1.5rem; font-weight: 700;">
                        <?= count(array_filter($clients, fn($c) => $c['status'] === 'active')) ?>
                    </div>
                </div>
                <div>
                    <div class="text-muted" style="font-size: 0.875rem;">Prospects</div>
                    <div style="font-size: 1.5rem; font-weight: 700;">
                        <?= count(array_filter($clients, fn($c) => $c['status'] === 'lead')) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function viewClient(clientId) {
            // TODO: Rediriger vers la page de détails du client
            alert('Détails du client #' + clientId + ' (page à créer)');
            // window.location.href = '/crm/client_view.php?id=' + clientId;
        }
    </script>
</body>
</html>
