<?php
/**
 * CLICOM - Dashboard CRM
 * Fichier: crm/index.php
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

init_session();
require_login();

$user = current_user();

// Récupération des statistiques
$db = getDB();

$stats = [
    'clients_total' => $db->query("SELECT COUNT(*) FROM clients")->fetchColumn(),
    'clients_active' => $db->query("SELECT COUNT(*) FROM clients WHERE status = 'active'")->fetchColumn(),
    'quotes_pending' => $db->query("SELECT COUNT(*) FROM quotes WHERE status IN ('draft', 'sent')")->fetchColumn(),
    'invoices_unpaid' => $db->query("SELECT COUNT(*) FROM invoices WHERE status IN ('sent', 'overdue')")->fetchColumn(),
    'projects_active' => $db->query("SELECT COUNT(*) FROM projects WHERE status = 'active'")->fetchColumn(),
    'tasks_pending' => $db->query("SELECT COUNT(*) FROM tasks WHERE status = 'pending'")->fetchColumn()
];

// Derniers clients
$recent_clients = $db->query("SELECT * FROM clients ORDER BY created_at DESC LIMIT 5")->fetchAll();

// Dernières tâches
$recent_tasks = $db->query("
    SELECT t.*, c.company_name 
    FROM tasks t 
    LEFT JOIN clients c ON t.client_id = c.id 
    WHERE t.status != 'completed' 
    ORDER BY t.due_date ASC 
    LIMIT 5
")->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard CRM - CLICOM</title>
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
        
        .stat-card {
            background: white;
            border: 1px solid var(--color-border);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
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
            <a href="/crm/index.php" class="sidebar-link active">📊 Dashboard</a>
            <a href="/crm/clients.php" class="sidebar-link">👥 Clients</a>
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
        <div style="margin-bottom: 2rem;">
            <h1>Dashboard</h1>
            <p class="text-muted">Vue d'ensemble de votre activité</p>
        </div>
        
        <!-- Statistiques -->
        <div class="grid grid-3" style="margin-bottom: 3rem;">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(51, 102, 255, 0.1); color: var(--color-primary);">
                    👥
                </div>
                <div>
                    <div class="text-muted" style="font-size: 0.875rem;">Clients actifs</div>
                    <div style="font-size: 1.75rem; font-weight: 700;"><?= $stats['clients_active'] ?></div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(245, 158, 11, 0.1); color: var(--color-warning);">
                    📄
                </div>
                <div>
                    <div class="text-muted" style="font-size: 0.875rem;">Devis en attente</div>
                    <div style="font-size: 1.75rem; font-weight: 700;"><?= $stats['quotes_pending'] ?></div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(239, 68, 68, 0.1); color: var(--color-error);">
                    💰
                </div>
                <div>
                    <div class="text-muted" style="font-size: 0.875rem;">Factures impayées</div>
                    <div style="font-size: 1.75rem; font-weight: 700;"><?= $stats['invoices_unpaid'] ?></div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(16, 185, 129, 0.1); color: var(--color-success);">
                    🚀
                </div>
                <div>
                    <div class="text-muted" style="font-size: 0.875rem;">Projets actifs</div>
                    <div style="font-size: 1.75rem; font-weight: 700;"><?= $stats['projects_active'] ?></div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(51, 102, 255, 0.1); color: var(--color-primary);">
                    ✅
                </div>
                <div>
                    <div class="text-muted" style="font-size: 0.875rem;">Tâches en attente</div>
                    <div style="font-size: 1.75rem; font-weight: 700;"><?= $stats['tasks_pending'] ?></div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(156, 163, 175, 0.1); color: var(--color-text-muted);">
                    📊
                </div>
                <div>
                    <div class="text-muted" style="font-size: 0.875rem;">Total clients</div>
                    <div style="font-size: 1.75rem; font-weight: 700;"><?= $stats['clients_total'] ?></div>
                </div>
            </div>
        </div>
        
        <!-- Grille 2 colonnes -->
        <div class="grid grid-2" style="align-items: start;">
            <!-- Derniers clients -->
            <div class="card">
                <h3 style="margin-bottom: 1.5rem;">Derniers clients</h3>
                
                <?php if (empty($recent_clients)): ?>
                    <p class="text-muted">Aucun client pour le moment.</p>
                <?php else: ?>
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 1px solid var(--color-border);">
                                <th style="text-align: left; padding: 0.75rem 0; font-size: 0.875rem; color: var(--color-text-muted);">Entreprise</th>
                                <th style="text-align: left; padding: 0.75rem 0; font-size: 0.875rem; color: var(--color-text-muted);">Statut</th>
                                <th style="text-align: left; padding: 0.75rem 0; font-size: 0.875rem; color: var(--color-text-muted);">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recent_clients as $client): ?>
                                <tr style="border-bottom: 1px solid var(--color-border);">
                                    <td style="padding: 0.75rem 0;">
                                        <strong><?= h($client['company_name']) ?></strong><br>
                                        <small class="text-muted"><?= h($client['email']) ?></small>
                                    </td>
                                    <td style="padding: 0.75rem 0;">
                                        <span style="padding: 0.25rem 0.5rem; background: rgba(51, 102, 255, 0.1); color: var(--color-primary); border-radius: var(--radius-sm); font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                                            <?= h($client['status']) ?>
                                        </span>
                                    </td>
                                    <td style="padding: 0.75rem 0; font-size: 0.875rem; color: var(--color-text-muted);">
                                        <?= format_date($client['created_at']) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                
                <div style="margin-top: 1.5rem;">
                    <a href="/crm/clients.php" class="btn btn-secondary btn-sm">Voir tous les clients →</a>
                </div>
            </div>
            
            <!-- Tâches prioritaires -->
            <div class="card">
                <h3 style="margin-bottom: 1.5rem;">Tâches à venir</h3>
                
                <?php if (empty($recent_tasks)): ?>
                    <p class="text-muted">Aucune tâche en attente.</p>
                <?php else: ?>
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        <?php foreach ($recent_tasks as $task): ?>
                            <div style="padding: 1rem; background: var(--color-bg); border-radius: var(--radius-md); border-left: 3px solid var(--color-primary);">
                                <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 0.5rem;">
                                    <strong><?= h($task['title']) ?></strong>
                                    <span style="padding: 0.125rem 0.5rem; background: rgba(239, 68, 68, 0.1); color: var(--color-error); border-radius: var(--radius-sm); font-size: 0.75rem; font-weight: 600;">
                                        <?= h(strtoupper($task['priority'])) ?>
                                    </span>
                                </div>
                                <div style="font-size: 0.875rem; color: var(--color-text-muted);">
                                    <?php if ($task['company_name']): ?>
                                        Client: <?= h($task['company_name']) ?><br>
                                    <?php endif; ?>
                                    <?php if ($task['due_date']): ?>
                                        Échéance: <?= format_date($task['due_date']) ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <div style="margin-top: 1.5rem;">
                    <a href="/crm/tasks.php" class="btn btn-secondary btn-sm">Voir toutes les tâches →</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
