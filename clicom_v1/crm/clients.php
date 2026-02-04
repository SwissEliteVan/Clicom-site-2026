<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Database connection
require_once __DIR__ . '/../includes/db_connect.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_client'])) {
    $company = $_POST['company'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    
    try {
        $stmt = $conn->prepare("INSERT INTO clients (company, contact_name, email, phone) VALUES (?, ?, ?, ?)");
        $stmt->execute([$company, $contact, $email, $phone]);
        
        // Reload page to show updated list
        header('Location: clients.php');
        exit;
    } catch (PDOException $e) {
        $error_message = "Erreur lors de l'ajout du client: " . $e->getMessage();
    }
}

// Get clients list
try {
    $stmt = $conn->query("SELECT id, company, contact_name, email, phone FROM clients");
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $clients = [];
    $error_message = "Erreur lors de la récupération des clients: " . $e->getMessage();
}
?>

<?php
$pageTitle = "Gestion Clients";
ob_start();
?>

<?php if (isset($error_message)): ?>
    <div class="error-message"><?= $error_message ?></div>
<?php endif; ?>

<div class="header-actions">
    <h1>Mes Clients</h1>
    <button id="addClientBtn" class="btn-primary">Ajouter un client</button>
</div>

<div id="addClientForm" style="display: none;" class="form-container">
    <h2>Ajouter un nouveau client</h2>
    <form method="POST" action="clients.php">
        <div class="form-group">
            <label for="company">Entreprise</label>
            <input type="text" id="company" name="company" required>
        </div>
        <div class="form-group">
            <label for="contact">Nom du contact</label>
            <input type="text" id="contact" name="contact" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Téléphone</label>
            <input type="tel" id="phone" name="phone">
        </div>
        <button type="submit" name="add_client" class="btn-primary">Enregistrer</button>
        <button type="button" id="cancelAddBtn" class="btn-secondary">Annuler</button>
    </form>
</div>

<?php if (!empty($clients)): ?>
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Entreprise</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= htmlspecialchars($client['id']) ?></td>
                    <td><?= htmlspecialchars($client['company']) ?></td>
                    <td><?= htmlspecialchars($client['contact_name']) ?></td>
                    <td><?= htmlspecialchars($client['email']) ?></td>
                    <td>
                        <a href="#" class="btn-action">Voir</a>
                        <a href="#" class="btn-action">Modifier</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p class="no-data">Aucun client trouvé</p>
<?php endif; ?>

<?php
$pageContent = ob_get_clean();

// Include common layout
require_once 'includes/admin_layout.php';
?>

<style>
.header-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.btn-primary {
    background-color: #3366ff;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    margin-left: 10px;
}

.form-container {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
}

.form-group input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.error-message {
    background-color: #ffdddd;
    color: #d8000c;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 4px;
}

.no-data {
    text-align: center;
    padding: 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.btn-action {
    color: #3366ff;
    text-decoration: none;
    margin-right: 10px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const addClientBtn = document.getElementById('addClientBtn');
    const cancelAddBtn = document.getElementById('cancelAddBtn');
    const addClientForm = document.getElementById('addClientForm');
    
    addClientBtn.addEventListener('click', function() {
        addClientForm.style.display = 'block';
        addClientBtn.style.display = 'none';
    });
    
    cancelAddBtn.addEventListener('click', function() {
        addClientForm.style.display = 'none';
        addClientBtn.style.display = 'block';
    });
});
</script>
