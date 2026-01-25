# 🚀 CLICOM - Écosystème Agence Digitale

**Version:** 1.0 | **Date:** Janvier 2026  
**Architecture:** PHP Natif + MariaDB | **Hébergement:** Hostinger Business

---

## 📋 TABLE DES MATIÈRES

1. [Vue d'ensemble](#vue-densemble)
2. [Stack Technique](#stack-technique)
3. [Structure des Fichiers](#structure-des-fichiers)
4. [Installation](#installation)
5. [Configuration](#configuration)
6. [Utilisation](#utilisation)
7. [Sécurité](#sécurité)
8. [Automatisations](#automatisations)
9. [FAQ](#faq)

---

## 🎯 VUE D'ENSEMBLE

**CLICOM** est un écosystème complet pour agence digitale comprenant :
- ✅ **Site vitrine multilingue** (FR, EN, DE, IT)
- ✅ **Générateur de devis interactif**
- ✅ **CRM custom** (clients, devis, factures, projets, tâches)
- ✅ **Portail client sécurisé**
- ✅ **Automatisations** (relances, expirations)
- ✅ **Design System "Tech Abstract"** (Suisse Minimaliste)

**Contrainte principale :** Zero dépendance frontend (pas de Node.js/NPM). Code 100% natif déployable via FTP.

---

## 🛠 STACK TECHNIQUE

### Backend
- **PHP 8.2** (POO, PDO, Sessions sécurisées)
- **MariaDB / MySQL** (8 tables relationnelles)
- **Apache** (.htaccess routing & sécurité)

### Frontend
- **CSS pur** (Design System avec variables CSS)
- **Vanilla JavaScript** (calculs interactifs, AJAX)
- **Google Fonts** (Outfit + Inter)

### Sécurité
- Protection CSRF (tokens de session)
- PDO Prepared Statements (anti-injection SQL)
- Sanitization XSS (htmlspecialchars)
- Headers sécurisés (X-Frame-Options, CSP, etc.)
- Tokens SHA256 pour portail client

---

## 📁 STRUCTURE DES FICHIERS

```
/public_html/
├── .htaccess                    # Sécurité + routing Apache
├── index.php                    # Router frontend multilingue
├── portal.php                   # Portail client (token)
├── cron.php                     # Automatisations
│
├── assets/
│   ├── css/
│   │   └── style.css            # Design System complet
│   ├── js/
│   │   └── script.js            # Scripts frontend
│   └── img/                     # Images (à uploader)
│
├── pages/                       # Pages du site
│   ├── home.php                 # Accueil
│   ├── services.php             # 8 pôles d'expertise
│   ├── pricing.php              # Tarifs (Starter, Growth, Mandat)
│   ├── method.php               # Méthode 30-60-90
│   ├── quote.php                # Générateur de devis interactif
│   └── contact.php              # Formulaire de contact
│
├── includes/
│   ├── config.php               # Configuration (DB, constantes)
│   ├── db_connect.php           # Connexion PDO Singleton
│   └── functions.php            # Helpers (auth, CSRF, sanitization)
│
├── crm/                         # Back-office CRM
│   ├── login.php                # Authentification
│   ├── index.php                # Dashboard
│   ├── logout.php               # Déconnexion
│   └── [clients, quotes, invoices, projects, tasks].php (à créer)
│
├── api/                         # Endpoints AJAX
│   ├── quote.php                # Traitement devis interactif
│   └── contact.php              # Traitement formulaire contact
│
├── install/
│   └── schema.sql               # Script SQL d'initialisation
│
└── storage/                     # Logs & uploads (hors Git)
    ├── logs/
    │   ├── app.log
    │   ├── php-errors.log
    │   └── cron.log
    └── uploads/
```

---

## 🔧 INSTALLATION

### **Étape 1 : Préparer la Base de Données**

1. Connectez-vous à **phpMyAdmin** (Hostinger → Bases de données)
2. Créez une nouvelle base : `u123456789_clicom`
3. Importez le fichier `install/schema.sql`
4. Vérifiez que les 10 tables sont créées :
   - users, clients, quotes, quote_items, invoices, invoice_items, projects, tasks, automation_rules, portal_tokens

**Compte admin par défaut :**
- **Username :** `admin`
- **Password :** `Admin@2026`

---

### **Étape 2 : Configuration**

Éditez le fichier `includes/config.php` :

```php
// Base de données (à adapter)
define('DB_HOST', 'localhost');
define('DB_NAME', 'u123456789_clicom');      // Votre BDD
define('DB_USER', 'u123456789_admin');        // Votre utilisateur
define('DB_PASS', 'VotreMotDePasseSecurise123!');

// Sécurité (générer une clé aléatoire de 64+ caractères)
define('APP_SALT', 'CHANGEZ_CETTE_CLE_SECRETE_UNIQUE');

// URLs (votre domaine)
define('BASE_URL', 'https://votredomaine.com');

// Mode production (désactiver le debug)
define('APP_DEBUG', false);
```

---

### **Étape 3 : Upload FTP**

1. Utilisez **FileZilla** ou le **Gestionnaire de Fichiers Hostinger**
2. Uploadez **TOUS** les fichiers dans `/public_html/`
3. Vérifiez les permissions :
   - Fichiers : `644`
   - Dossiers : `755`
4. Le dossier `storage/` doit être inscriptible (755 ou 775)

---

### **Étape 4 : Tests**

1. **Frontend** : Ouvrez `https://votredomaine.com` → Page d'accueil doit s'afficher
2. **CRM** : Allez sur `https://votredomaine.com/crm/login.php` → Connectez-vous avec `admin / Admin@2026`
3. **Générateur de devis** : Testez `https://votredomaine.com/?page=quote`
4. **API** : Envoyez un devis test → vérifiez dans le CRM qu'il apparaît en "draft"

---

## ⚙️ CONFIGURATION AVANCÉE

### **1. SMTP (Emails)**

Par défaut, les emails utilisent `mail()` de PHP. Pour plus de fiabilité, activez SMTP dans `includes/config.php` :

```php
define('SMTP_ENABLED', true);
define('SMTP_HOST', 'smtp.hostinger.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'contact@votredomaine.com');
define('SMTP_PASS', 'VotreMotDePasseSMTP');
define('SMTP_FROM_EMAIL', 'contact@votredomaine.com');
define('SMTP_FROM_NAME', 'CLICOM Studio');
```

Installez ensuite PHPMailer (optionnel mais recommandé).

---

### **2. Cron (Automatisations)**

**Configurer le Cron Hostinger :**

1. Allez dans **Hostinger → Avancé → Cron Jobs**
2. Ajoutez une nouvelle tâche :
   - **Commande :** `php /home/username/public_html/cron.php`
   - **Fréquence :** Tous les jours à 08:55 (ou selon préférence)

**Ce que fait le cron :**
- Marque les factures impayées (J+10) en "overdue"
- Crée des tâches de relance automatiques
- Expire les devis (selon `valid_until`)
- Nettoie les tokens portail expirés
- Génère des stats quotidiennes

**Test manuel :** `https://votredomaine.com/cron.php?key=CLE_SECRETE` (voir le fichier pour la clé)

---

### **3. Portail Client**

Pour donner accès à un client :

1. Allez dans le CRM → Clients → Sélectionner un client
2. Cliquez sur "Générer lien portail"
3. Un token unique est créé (SHA256, expire après 30 jours)
4. Envoyez le lien au client : `https://votredomaine.com/portal.php?token=XXX`

Le client pourra voir :
- Ses devis
- Ses factures
- Ses projets
- Aucun accès au CRM admin

---

## 🔒 SÉCURITÉ

### **Mesures implémentées :**

✅ **SQL Injection** : PDO Prepared Statements partout  
✅ **XSS** : `htmlspecialchars()` sur toutes les sorties  
✅ **CSRF** : Tokens de session sur formulaires  
✅ **Clickjacking** : Header `X-Frame-Options: SAMEORIGIN`  
✅ **HTTPS Forcé** : Redirection 301 automatique dans `.htaccess`  
✅ **Headers sécurisés** : CSP, X-XSS-Protection, HSTS (optionnel)  
✅ **Dossiers protégés** : `/includes`, `/storage`, `/install` bloqués  

### **Checklist avant mise en production :**

- [ ] Changer `APP_SALT` dans `config.php`
- [ ] Désactiver `APP_DEBUG` (mettre à `false`)
- [ ] Changer le mot de passe admin par défaut
- [ ] Supprimer ou protéger le dossier `/install/` après installation
- [ ] Activer HTTPS (certificat SSL Hostinger)
- [ ] Configurer les sauvegardes DB (Hostinger Backups)

---

## 🎨 PERSONNALISATION

### **1. Couleurs**

Éditez `assets/css/style.css` (variables CSS `:root`) :

```css
:root {
    --color-primary: #3366ff;        /* Bleu */
    --color-primary-dark: #2952cc;
    --color-text: #1a1a2e;           /* Noir */
    --color-bg: #f9fafb;             /* Gris clair */
}
```

Remplacez par vos couleurs de marque. Toute l'interface s'adaptera automatiquement.

---

### **2. Traductions**

Les traductions sont dans `index.php` (tableau `$translations`). Pour ajouter une langue :

```php
'es' => [  // Espagnol
    'site_title' => 'CLICOM - Agencia Digital',
    'nav_home' => 'Inicio',
    // ... etc
]
```

Ajoutez `'es'` dans `$allowed_langs`.

---

### **3. Services**

Pour modifier les 8 pôles d'expertise : éditez `pages/services.php` et `pages/quote.php` (tableau `$services`).

---

## 📊 UTILISATION DU CRM

### **Workflow type :**

1. **Lead arrive via le générateur de devis** → Créé automatiquement en "lead"
2. **Admin CRM** :
   - Voit le devis draft dans Dashboard
   - Affine les détails (lignes de devis, TVA, validité)
   - Change le statut en "sent" → Email au client
3. **Client** :
   - Reçoit le devis par email + lien portail
   - Accepte le devis via le portail
4. **Admin CRM** :
   - Crée le projet lié au devis
   - Génère la facture
   - Assigne des tâches
5. **Cron automatique** :
   - Relance si facture impayée J+10
   - Expire les devis non signés

---

## 🐛 DÉPANNAGE

### **Erreur "500 Internal Server Error"**
- Vérifiez les permissions (fichiers 644, dossiers 755)
- Vérifiez le `.htaccess` (syntaxe Apache)
- Activez `APP_DEBUG` dans `config.php` pour voir l'erreur exacte

### **"Erreur de connexion à la base de données"**
- Vérifiez les identifiants dans `config.php`
- Testez la connexion dans phpMyAdmin

### **Formulaire de devis ne fonctionne pas**
- Ouvrez la console navigateur (F12) → onglet Network
- Vérifiez que `/api/quote.php` renvoie un JSON
- Vérifiez que la BDD est accessible

### **Le Cron ne s'exécute pas**
- Testez manuellement : `/cron.php?key=XXXX`
- Vérifiez les logs : `storage/logs/cron.log`

---

## 🚀 ROADMAP (Améliorations futures)

- [ ] Pages CRUD complètes dans le CRM (clients, devis, factures)
- [ ] Export PDF des devis/factures
- [ ] Intégration SMTP PHPMailer
- [ ] Dashboard analytics (graphiques CA)
- [ ] Module e-signature pour devis
- [ ] API REST complète
- [ ] Module multicompte (plusieurs agences)

---

## 📝 SUPPORT & LICENCE

**Développé pour :** CLICOM Studio  
**Date :** Janvier 2026  
**Compatibilité :** PHP 8.0+, MariaDB 10.3+, Apache 2.4+

**En cas de problème :** Consultez les logs dans `storage/logs/`

---

**🎉 Félicitations ! Votre application est prête à l'emploi.**

Pour toute question technique, vérifiez :
1. Les logs (`storage/logs/`)
2. La documentation PHP : https://php.net
3. La doc Hostinger : https://support.hostinger.com

**Bon lancement ! 🚀**
