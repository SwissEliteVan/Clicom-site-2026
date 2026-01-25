<?php
/**
 * CLICOM - Configuration de la Base de Données
 * Fichier: includes/config.php
 * Version: 1.0
 */

// =================================================
// CONFIGURATION HOSTINGER (À ADAPTER)
// =================================================

// Mode développement (Désactiver en production)
define('APP_DEBUG', true);

// Base de données
define('DB_HOST', 'localhost'); // Hostinger utilise généralement 'localhost'
define('DB_NAME', 'u929708752_ClicomCRM'); // Remplacer par votre nom de base
define('DB_USER', 'u929708752_ClicMoh'); // Remplacer par votre utilisateur
define('DB_PASS', '#fYi6LJa^#zF3W'); // Remplacer par votre mot de passe
define('DB_CHARSET', 'utf8mb4');

// Sécurité
define('APP_SALT','fe8a1127e1ea2047dcd63560e907df9eff29e6f3b2a464d285459928fc47b748'); // Générez une clé aléatoire de 64+ caractères
define('SESSION_LIFETIME', 7200); // 2 heures
define('PORTAL_TOKEN_EXPIRY_DAYS', 30); // Durée validité token portail client

// URLs
define('BASE_URL', 'https://clicom.ch'); // Votre domaine
define('CRM_URL', BASE_URL . '/crm');
define('API_URL', BASE_URL . '/api');

// Email (Configuration SMTP Hostinger)
define('SMTP_ENABLED', true); // Activer si vous voulez utiliser SMTP
define('SMTP_HOST', 'smtp.hostinger.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'contact@clicom.ch');
define('SMTP_PASS', '');
define('SMTP_FROM_EMAIL', 'contact@clicom.ch');
define('SMTP_FROM_NAME', 'CLICOM Studio');

// Timezone
date_default_timezone_set('Europe/Zurich');

// Gestion des erreurs
if (APP_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ini_set('error_log', __DIR__ . '/../storage/logs/php-errors.log');
}

// =================================================
// NE PAS MODIFIER EN DESSOUS (sauf si nécessaire)
// =================================================

// Chemins
define('ROOT_PATH', dirname(__DIR__));
define('INCLUDES_PATH', ROOT_PATH . '/includes');
define('STORAGE_PATH', ROOT_PATH . '/storage');
define('UPLOADS_PATH', STORAGE_PATH . '/uploads');

// Créer les dossiers nécessaires s'ils n'existent pas
$dirs = [
    STORAGE_PATH,
    STORAGE_PATH . '/logs',
    UPLOADS_PATH
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}
