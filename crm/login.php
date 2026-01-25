<?php
/**
 * CLICOM - Login CRM
 * Fichier: crm/login.php
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

init_session();

// Si déjà connecté, rediriger vers le dashboard
if (is_logged_in()) {
    redirect('/crm/index.php');
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = clean($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($username) || empty($password)) {
        $error = 'Tous les champs sont requis.';
    } else {
        if (login_user($username, $password)) {
            redirect('/crm/index.php');
        } else {
            $error = 'Identifiants incorrects.';
            log_error('Failed login attempt for username: ' . $username);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion CRM - CLICOM</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body style="display: flex; align-items: center; justify-content: center; min-height: 100vh; background: linear-gradient(135deg, #f9fafb 0%, #ffffff 100%);">
    <div class="card" style="max-width: 400px; width: 100%; margin: 2rem;">
        <div style="text-align: center; margin-bottom: 2rem;">
            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--color-primary), var(--color-primary-light)); border-radius: var(--radius-lg); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; font-weight: 700; margin: 0 auto 1rem;">
                C
            </div>
            <h1 style="margin-bottom: 0.5rem;">CRM CLICOM</h1>
            <p class="text-muted">Connexion Administrateur</p>
        </div>
        
        <?php if ($error): ?>
            <div style="padding: 1rem; background: var(--color-error); color: white; border-radius: var(--radius-md); margin-bottom: 1.5rem;">
                <?= h($error) ?>
            </div>
        <?php endif; ?>
        
        <form method="post">
            <div class="form-group">
                <label class="form-label">Nom d'utilisateur</label>
                <input type="text" name="username" class="form-input" value="<?= h($_POST['username'] ?? '') ?>" required autofocus>
            </div>
            
            <div class="form-group">
                <label class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-input" required>
            </div>
            
            <button type="submit" class="btn btn-primary" style="width: 100%;">
                Se connecter →
            </button>
        </form>
        
        <div style="margin-top: 1.5rem; text-align: center; font-size: 0.875rem; color: var(--color-text-muted);">
            Par défaut: <code>admin</code> / <code>Admin@2026</code>
        </div>
    </div>
</body>
</html>
