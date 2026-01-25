# Clic COM - Tech Abstract Premium (PHP Version)

Site web professionnel pour Clic COM avec design Tech Abstract Premium optimisé pour hébergement Hostinger.

## 📁 Structure des fichiers

```
php-hostinger/
├── index.php                    # Page d'accueil
├── services.php                 # Page services (à créer)
├── realisations.php            # Page réalisations (à créer)
├── apropos.php                 # Page à propos (à créer)
├── blog.php                    # Page blog (à créer)
├── contact.php                 # Page contact (à créer)
├── mentions-legales.php        # Mentions légales (à créer)
├── politique-confidentialite.php # Politique de confidentialité (à créer)
├── cookies.php                 # Page cookies (à créer)
├── includes/
│   ├── config.php             # Configuration du site (IMPORTANT)
│   ├── header.php             # En-tête et navigation
│   └── footer.php             # Pied de page
├── assets/
│   ├── css/
│   │   └── style.css          # Styles Tech Abstract Premium
│   ├── js/
│   │   └── main.js            # JavaScript interactif
│   └── img/                   # Dossier pour vos images
└── README.md                  # Ce fichier
```

## 🚀 Instructions de déploiement sur Hostinger

### Étape 1 : Préparer vos fichiers

1. **Vérifiez la configuration** dans `includes/config.php` :
   ```php
   define('SITE_NAME', 'Clic COM');              // Nom de votre site
   define('SITE_SLOGAN', 'Le marketing qui fait vendre'); // Slogan
   define('SITE_EMAIL', 'contact@cliccom.ch');   // Votre email
   define('SITE_PHONE', '+41 XX XXX XX XX');     // Votre téléphone
   define('SITE_URL', 'https://www.cliccom.ch'); // URL de votre site
   ```

2. **Ajoutez vos images** dans le dossier `assets/img/`

### Étape 2 : Uploader sur Hostinger

#### Via File Manager (Interface Web)

1. Connectez-vous à votre compte Hostinger
2. Allez dans **File Manager** (Gestionnaire de fichiers)
3. Naviguez vers le dossier `public_html` (ou `www`)
4. **Supprimez** tous les fichiers par défaut dans `public_html`
5. **Uploadez** tous les fichiers du dossier `php-hostinger` :
   - Sélectionnez **Upload** (Télécharger)
   - Uploadez tous les fichiers et dossiers
   - Assurez-vous que la structure est :
     ```
     public_html/
     ├── index.php
     ├── includes/
     ├── assets/
     └── etc.
     ```

#### Via FTP (FileZilla)

1. Téléchargez [FileZilla](https://filezilla-project.org/)
2. Dans Hostinger, allez dans **FTP Accounts** pour obtenir :
   - Hôte FTP : `ftp.votre-domaine.com`
   - Nom d'utilisateur
   - Mot de passe
   - Port : `21`
3. Connectez-vous avec FileZilla
4. Naviguez vers `public_html`
5. Glissez-déposez tous les fichiers de `php-hostinger`

### Étape 3 : Vérification

1. Visitez votre site : `https://votre-domaine.com`
2. Vérifiez que :
   - ✅ La page d'accueil s'affiche correctement
   - ✅ Les styles CSS sont appliqués
   - ✅ La navigation fonctionne
   - ✅ Le footer affiche vos informations

## ⚙️ Configuration

### Modifier les informations du site

Éditez `includes/config.php` :

```php
// Informations du site
define('SITE_NAME', 'Votre Nom');
define('SITE_SLOGAN', 'Votre Slogan');
define('SITE_EMAIL', 'votre@email.com');
define('SITE_PHONE', '+41 XX XXX XX XX');
define('SITE_URL', 'https://votre-domaine.com');
define('PRIMARY_COLOR', '#5B2EFF'); // Couleur principale

// Modifier la navigation
$navigation = [
    ['label' => 'Accueil', 'href' => 'index.php'],
    ['label' => 'Services', 'href' => 'services.php'],
    // Ajoutez ou modifiez les liens ici
];
```

### Modifier les couleurs

Éditez `assets/css/style.css` (lignes 9-56) :

```css
:root {
  --primary-color: #5B2EFF;        /* Couleur principale */
  --primary-rgb: 91, 46, 255;      /* RGB de la couleur principale */
  --bg-primary: #FFFFFF;            /* Couleur de fond */
  --text-primary: #111111;          /* Couleur du texte */
  /* ... */
}
```

## 📄 Créer les pages manquantes

Pour créer une nouvelle page (ex: `services.php`), utilisez ce modèle :

```php
<?php
$pageTitle = 'Services - ' . SITE_NAME;
require_once __DIR__ . '/includes/header.php';
?>

<main>
    <section class="section-spacing tech-grid-bg">
        <div class="container-tech">
            <h1>Nos Services</h1>

            <!-- Votre contenu ici -->

        </div>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
```

### Pages à créer :

1. ✅ `index.php` - Page d'accueil (créée)
2. ⏳ `services.php` - Page services
3. ⏳ `realisations.php` - Page réalisations
4. ⏳ `apropos.php` - Page à propos
5. ⏳ `blog.php` - Page blog
6. ⏳ `contact.php` - Page contact avec formulaire
7. ⏳ `mentions-legales.php` - Mentions légales
8. ⏳ `politique-confidentialite.php` - Politique de confidentialité
9. ⏳ `cookies.php` - Politique des cookies

## 🎨 Classes CSS disponibles

### Containers & Layout
```html
<div class="container-tech">           <!-- Container responsive -->
<section class="section-spacing">      <!-- Espacement de section -->
```

### Composants
```html
<div class="tech-card">                <!-- Carte avec hover effect -->
<a class="tech-button-primary">        <!-- Bouton principal -->
<a class="tech-button-secondary">      <!-- Bouton secondaire -->
<input class="tech-input">             <!-- Input de formulaire -->
```

### Backgrounds
```html
<div class="tech-grid-bg">             <!-- Fond avec grille -->
<div class="tech-gradient-bg">         <!-- Fond avec gradient -->
<div class="tech-radial-bg">           <!-- Fond avec radial gradient -->
```

### Utilities
```html
<div class="flex items-center">        <!-- Flex avec alignement -->
<div class="flex justify-between">     <!-- Flex avec justification -->
<div class="gap-4">                    <!-- Espacement entre éléments -->
<div class="py-4">                     <!-- Padding vertical -->
```

## 🔧 Maintenance

### Mettre à jour le contenu

1. **Modifier le texte** : Éditez directement dans les fichiers `.php`
2. **Ajouter des images** : Uploadez dans `assets/img/` et référencez :
   ```html
   <img src="assets/img/votre-image.jpg" alt="Description">
   ```
3. **Modifier les liens** : Mettez à jour dans `includes/config.php`

### Sauvegarde

Faites régulièrement des sauvegardes :
1. Via Hostinger : **Backups** (automatique)
2. Via FTP : Téléchargez tous les fichiers localement

## 📊 Optimisations SEO

### Meta tags (dans header.php)

Les meta tags de base sont déjà configurés. Pour améliorer :

1. Ajoutez des meta descriptions personnalisées par page
2. Configurez Open Graph pour les réseaux sociaux
3. Ajoutez un fichier `sitemap.xml`
4. Créez un fichier `robots.txt`

### Performance

- ✅ CSS minifié (à faire si besoin)
- ✅ Google Fonts optimisés (preconnect déjà configuré)
- ✅ Images : optimisez avant upload (max 200KB recommandé)

## 🐛 Dépannage

### La page est blanche

1. Activez l'affichage des erreurs PHP temporairement :
   ```php
   // Ajoutez en haut de index.php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   ```
2. Vérifiez les chemins des `require_once`
3. Vérifiez les permissions des fichiers (644 pour fichiers, 755 pour dossiers)

### Les styles ne s'affichent pas

1. Vérifiez le chemin dans `includes/header.php` :
   ```html
   <link rel="stylesheet" href="assets/css/style.css">
   ```
2. Videz le cache du navigateur (Ctrl + F5)
3. Vérifiez que `style.css` est bien uploadé

### Les liens ne fonctionnent pas

1. Assurez-vous que les extensions `.php` sont correctes
2. Vérifiez la configuration du serveur Apache (`.htaccess` si nécessaire)

## 📞 Support

Pour toute question sur le déploiement :
- Documentation Hostinger : https://support.hostinger.com
- Support Hostinger : Via votre panel d'administration

## 🎯 Prochaines étapes

1. ✅ Créer les pages manquantes (services, réalisations, etc.)
2. ✅ Ajouter un formulaire de contact fonctionnel
3. ✅ Configurer Google Analytics
4. ✅ Optimiser les images
5. ✅ Créer un sitemap XML
6. ✅ Tester sur mobile
7. ✅ Configurer SSL (HTTPS) via Hostinger

---

**Version:** 1.0.0
**Design System:** Tech Abstract Premium
**Dernière mise à jour:** Janvier 2026
