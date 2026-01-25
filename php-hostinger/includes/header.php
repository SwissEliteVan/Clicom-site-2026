<?php
/**
 * Header - Tech Abstract Premium
 * Swiss-style navigation with precision and clarity
 */
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/config.php';
}

$pageTitle = isset($pageTitle) ? $pageTitle : SITE_NAME;
$metaDescription = isset($metaDescription) ? $metaDescription : SITE_SLOGAN;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?> | <?php echo SITE_NAME; ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($metaDescription); ?>">

    <!-- Google Fonts - Tech Abstract Premium -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- CSS Tech Abstract Premium -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Theme Color -->
    <meta name="theme-color" content="<?php echo PRIMARY_COLOR; ?>">
</head>
<body>
    <!-- Navbar -->
    <header class="tech-navbar">
        <div class="container-tech flex items-center justify-between py-4">
            <!-- Logo -->
            <a href="index.php" class="tech-logo" aria-label="Retour à l'accueil">
                <svg width="8" height="8" viewBox="0 0 8 8" fill="currentColor" class="tech-logo-dot" aria-hidden="true">
                    <circle cx="4" cy="4" r="4" />
                </svg>
                <span class="tech-logo-text"><?php echo SITE_NAME; ?></span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="tech-nav-desktop" aria-label="Navigation principale">
                <?php foreach ($navigation as $item): ?>
                    <a href="<?php echo $item['href']; ?>"
                       class="tech-nav-link <?php echo isActive($item['href']); ?>">
                        <?php echo htmlspecialchars($item['label']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <!-- CTA Mobile -->
            <a href="contact.php" class="tech-cta-mobile" aria-label="Demander un devis">
                Devis
            </a>
        </div>

        <!-- Mobile Navigation -->
        <div class="tech-nav-mobile-wrapper">
            <div class="container-tech flex flex-wrap gap-4 py-3">
                <?php foreach ($navigation as $item): ?>
                    <a href="<?php echo $item['href']; ?>"
                       class="tech-nav-link-mobile <?php echo isActive($item['href']); ?>">
                        <?php echo htmlspecialchars($item['label']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
