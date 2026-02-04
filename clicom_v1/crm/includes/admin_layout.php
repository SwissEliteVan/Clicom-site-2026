<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin CRM - Clicom</title>
    <style>
        :root {
            --bg-dark: #1a1a2e;
            --accent: #3366ff;
            --text-light: #ffffff;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: var(--bg-dark);
            color: var(--text-light);
            position: fixed;
            height: 100%;
            padding: 20px 0;
        }
        
        .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-nav ul {
            list-style: none;
            padding: 20px 0;
        }
        
        .sidebar-nav li {
            margin-bottom: 5px;
        }
        
        .sidebar-nav a {
            display: block;
            padding: 12px 20px;
            color: var(--text-light);
            text-decoration: none;
            transition: background 0.3s;
        }
        
        .sidebar-nav a:hover {
            background-color: rgba(255,255,255,0.1);
        }
        
        .sidebar-nav a.active {
            background-color: var(--accent);
        }
        
        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
        }
        
        .content-header {
            margin-bottom: 30px;
        }
        
        .content-header h1 {
            font-size: 24px;
            color: var(--bg-dark);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>Clicom CRM</h2>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li><a href="dashboard.php" class="active">📊 Dashboard</a></li>
                <li><a href="clients.php">👥 Clients</a></li>
                <li><a href="#">📝 Devis</a></li>
                <li><a href="#">💶 Factures</a></li>
                <li><a href="logout.php">🔓 Déconnexion</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <header class="content-header">
            <h1><?php echo $pageTitle ?? 'Tableau de bord'; ?></h1>
        </header>
        <?php echo $pageContent; ?>
    </main>
</body>
</html>