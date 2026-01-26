<?php
/**
 * CLICOM - Router Frontend Multilingue
 * Site Vitrine | Version 1.0
 * Langues supportées: FR, EN, DE, IT
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

init_session();

// Détection de la langue (par défaut: FR)
$lang = $_GET['lang'] ?? $_SESSION['lang'] ?? 'fr';
$allowed_langs = ['fr', 'en', 'de', 'it'];

if (!in_array($lang, $allowed_langs)) {
    $lang = 'fr';
}

$_SESSION['lang'] = $lang;

// Router simple basé sur ?page=xxx
$page = $_GET['page'] ?? 'home';
$allowed_pages = ['home', 'services', 'pricing', 'method', 'quote', 'contact'];

if (!in_array($page, $allowed_pages)) {
    $page = 'home';
}

// Traductions basiques (à externaliser dans un fichier JSON en production)
$translations = [
    'fr' => [
        'site_title' => 'CLICOM - Agence Digitale Suisse',
        'nav_home' => 'Accueil',
        'nav_services' => 'Services',
        'nav_pricing' => 'Tarifs',
        'nav_method' => 'Méthode',
        'nav_quote' => 'Devis',
        'nav_contact' => 'Contact',
        'hero_label' => 'Agence Digitale Suisse',
        'hero_title' => 'Nous ne faisons pas faire,<br>nous savons faire',
        'hero_subtitle' => 'Stratégie, Développement Web, Marketing Digital. Solutions complètes pour PME ambitieuses.',
        'cta_quote' => 'Obtenir un devis',
        'cta_discover' => 'Découvrir nos services'
    ],
    'en' => [
        'site_title' => 'CLICOM - Swiss Digital Agency',
        'nav_home' => 'Home',
        'nav_services' => 'Services',
        'nav_pricing' => 'Pricing',
        'nav_method' => 'Method',
        'nav_quote' => 'Quote',
        'nav_contact' => 'Contact',
        'hero_label' => 'Swiss Digital Agency',
        'hero_title' => 'We don\'t outsource,<br>we know how to do it',
        'hero_subtitle' => 'Strategy, Web Development, Digital Marketing. Complete solutions for ambitious SMEs.',
        'cta_quote' => 'Get a quote',
        'cta_discover' => 'Discover our services'
    ],
    'de' => [
        'site_title' => 'CLICOM - Schweizer Digitalagentur',
        'nav_home' => 'Startseite',
        'nav_services' => 'Dienstleistungen',
        'nav_pricing' => 'Preise',
        'nav_method' => 'Methode',
        'nav_quote' => 'Angebot',
        'nav_contact' => 'Kontakt',
        'hero_label' => 'Schweizer Digitalagentur',
        'hero_title' => 'Wir lagern nicht aus,<br>wir wissen wie es geht',
        'hero_subtitle' => 'Strategie, Webentwicklung, Digital Marketing. Komplettlösungen für ambitionierte KMU.',
        'cta_quote' => 'Angebot erhalten',
        'cta_discover' => 'Dienstleistungen entdecken'
    ],
    'it' => [
        'site_title' => 'CLICOM - Agenzia Digitale Svizzera',
        'nav_home' => 'Home',
        'nav_services' => 'Servizi',
        'nav_pricing' => 'Prezzi',
        'nav_method' => 'Metodo',
        'nav_quote' => 'Preventivo',
        'nav_contact' => 'Contatto',
        'hero_label' => 'Agenzia Digitale Svizzera',
        'hero_title' => 'Non deleghiamo,<br>sappiamo come fare',
        'hero_subtitle' => 'Strategia, Sviluppo Web, Marketing Digitale. Soluzioni complete per PMI ambiziose.',
        'cta_quote' => 'Richiedi preventivo',
        'cta_discover' => 'Scopri i nostri servizi'
    ]
];

$t = $translations[$lang];

function t($key) {
    global $t;
    return $t[$key] ?? $key;
}

function lang_link($page_name, $new_lang = null) {
    global $lang, $page;
    $target_lang = $new_lang ?? $lang;
    $target_page = $page_name ?? $page;
    return "?page=$target_page&lang=$target_lang";
}

?>
<!DOCTYPE html>
<html lang="<?= h($lang) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CLICOM - Agence digitale suisse spécialisée en développement web, marketing digital et stratégie pour PME.">
    <title><?= h(t('site_title')) ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="icon" type="image/svg+xml" href="/assets/img/favicon.svg">
</head>
<body>
    <!-- HEADER & NAVIGATION -->
    <header class="header">
        <div class="container">
            <nav class="nav">
                <a href="<?= lang_link('home') ?>" class="nav-logo">
                    <div class="nav-logo-icon">C</div>
                    <span>CLICOM</span>
                </a>
                
                <ul class="nav-menu" id="navMenu">
                    <li><a href="<?= lang_link('home') ?>" class="nav-link"><?= h(t('nav_home')) ?></a></li>
                    <li><a href="<?= lang_link('services') ?>" class="nav-link"><?= h(t('nav_services')) ?></a></li>
                    <li><a href="<?= lang_link('pricing') ?>" class="nav-link"><?= h(t('nav_pricing')) ?></a></li>
                    <li><a href="<?= lang_link('method') ?>" class="nav-link"><?= h(t('nav_method')) ?></a></li>
                    <li><a href="<?= lang_link('quote') ?>" class="btn btn-primary btn-sm"><?= h(t('nav_quote')) ?></a></li>
                    
                    <!-- Sélecteur de langue -->
                    <li style="display: flex; gap: 0.5rem;">
                        <a href="<?= lang_link($page, 'fr') ?>" class="nav-link <?= $lang === 'fr' ? 'text-primary' : '' ?>">FR</a>
                        <a href="<?= lang_link($page, 'en') ?>" class="nav-link <?= $lang === 'en' ? 'text-primary' : '' ?>">EN</a>
                        <a href="<?= lang_link($page, 'de') ?>" class="nav-link <?= $lang === 'de' ? 'text-primary' : '' ?>">DE</a>
                        <a href="<?= lang_link($page, 'it') ?>" class="nav-link <?= $lang === 'it' ? 'text-primary' : '' ?>">IT</a>
                    </li>
                </ul>
                
                <button class="nav-toggle" id="navToggle" aria-expanded="false" aria-label="Toggle navigation">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </nav>
        </div>
    </header>

    <!-- CONTENU PRINCIPAL -->
    <main>
        <?php
        // Inclusion du contenu selon la page demandée
        switch ($page) {
            case 'home':
                include __DIR__ . '/pages/home.php';
                break;
            case 'services':
                include __DIR__ . '/pages/services.php';
                break;
            case 'pricing':
                include __DIR__ . '/pages/pricing.php';
                break;
            case 'method':
                include __DIR__ . '/pages/method.php';
                break;
            case 'quote':
                include __DIR__ . '/pages/quote.php';
                break;
            case 'contact':
                include __DIR__ . '/pages/contact.php';
                break;
            default:
                echo '<div class="container section"><h1>Page non trouvée</h1></div>';
        }
        ?>
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="grid grid-3">
                <div>
                    <div class="nav-logo" style="color: white; margin-bottom: 1rem;">
                        <div class="nav-logo-icon">C</div>
                        <span>CLICOM</span>
                    </div>
                    <p style="color: rgba(255,255,255,0.7);">
                        Agence digitale suisse spécialisée dans les solutions web et marketing pour PME.
                    </p>
                </div>
                <div>
                    <h4 style="color: white; margin-bottom: 1rem;">Navigation</h4>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="<?= lang_link('services') ?>"><?= h(t('nav_services')) ?></a></li>
                        <li><a href="<?= lang_link('pricing') ?>"><?= h(t('nav_pricing')) ?></a></li>
                        <li><a href="<?= lang_link('method') ?>"><?= h(t('nav_method')) ?></a></li>
                        <li><a href="<?= lang_link('contact') ?>"><?= h(t('nav_contact')) ?></a></li>
                    </ul>
                </div>
                <div>
                    <h4 style="color: white; margin-bottom: 1rem;">Contact</h4>
                    <p style="color: rgba(255,255,255,0.7);">
                        Email: contact@clicom.ch<br>
                        Tél: +41 22 XXX XX XX<br>
                        Genève, Suisse
                    </p>
                </div>
            </div>
            <div class="footer-bottom">
                &copy; <?= date('Y') ?> CLICOM. Tous droits réservés.
            </div>
        </div>
    </footer>

    <script>
        // Menu mobile toggle
        const navToggle = document.getElementById('navToggle');
        const navMenu = document.getElementById('navMenu');
        
        if (navToggle && navMenu) {
            navToggle.addEventListener('click', () => {
                const isActive = navMenu.classList.contains('active');
                navMenu.classList.toggle('active');
                navToggle.setAttribute('aria-expanded', !isActive);
            });
        }
    </script>
</body>
</html>
