<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Database connection
require_once __DIR__ . '/../includes/db_connect.php';

// Get statistics
$clients_count = 0;
$unread_messages = 0;
$revenue = 0;

try {
    // Get clients count
    $stmt = $conn->query("SELECT COUNT(*) FROM clients");
    $clients_count = $stmt->fetchColumn();
    
    // Get unread messages count
    $stmt = $conn->query("SELECT COUNT(*) FROM messages WHERE read_status = 0");
    $unread_messages = $stmt->fetchColumn();
} catch (PDOException $e) {
    // Handle error
}
?>

<?php
$pageTitle = "Tableau de bord";
$pageContent = <<<HTML
<div class="stats-container">
    <div class="stat-card">
        <h3>Clients</h3>
        <p>{$clients_count}</p>
    </div>
    <div class="stat-card">
        <h3>Messages non lus</h3>
        <p>{$unread_messages}</p>
    </div>
    <div class="stat-card">
        <h3>Chiffre d'Affaires</h3>
        <p>0 CHF</p>
    </div>
</div>

<h2>Derniers messages</h2>
<table class="data-table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Message</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
HTML;

try {
    // Get latest messages
    $stmt = $conn->query("SELECT name, email, message, created_at FROM messages ORDER BY created_at DESC LIMIT 5");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $truncated_message = strlen($row['message']) > 50 
            ? substr($row['message'], 0, 50) . '...' 
            : $row['message'];
            
        $pageContent .= "<tr>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$truncated_message}</td>
            <td>{$row['created_at']}</td>
        </tr>";
    }
} catch (PDOException $e) {
    // Handle error
}

$pageContent .= <<<HTML
    </tbody>
</table>
HTML;

// Include common layout
require_once 'includes/admin_layout.php';
?>

<style>
.stats-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    background: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    text-align: center;
}

.stat-card h3 {
    font-size: 1rem;
    color: #666;
    margin-bottom: 10px;
}

.stat-card p {
    font-size: 1.8rem;
    font-weight: bold;
    color: #3366ff;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.data-table th,
.data-table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #eee;
}

.data-table th {
    background-color: #f8f9fa;
    font-weight: 600;
}
</style>