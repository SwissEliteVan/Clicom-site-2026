<?php
/**
 * Configuration globale du site Clic COM
 * Toutes les informations du site centralisées ici
 */

// Informations de base
define('SITE_NAME', 'Clic COM');
define('SITE_SLOGAN', 'Le marketing qui fait vendre');
define('SITE_URL', 'https://www.clic-com.ch');
define('SITE_EMAIL', 'contact@clic-com.ch');
define('SITE_PHONE', '+41 XX XXX XX XX');

// Couleur primaire (Tech Abstract Premium)
define('PRIMARY_COLOR', '#5B2EFF');

// Navigation principale
$navigation = [
    ['label' => 'Accueil', 'href' => 'index.php'],
    ['label' => 'Nos Solutions', 'href' => 'services.php'],
    ['label' => 'Réalisations', 'href' => 'realisations.php'],
    ['label' => "L'Agence", 'href' => 'apropos.php'],
    ['label' => 'Blog', 'href' => 'blog.php'],
    ['label' => 'Contact', 'href' => 'contact.php'],
];

// Fonction helper pour vérifier la page active
function isActive($page) {
    $currentPage = basename($_SERVER['PHP_SELF']);
    return $currentPage === $page ? 'tech-nav-link-active' : '';
}

// Année actuelle pour le footer
$currentYear = date('Y');
?>
