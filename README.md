# Clic COM — Site vitrine Astro

Site vitrine statique pour **Clic COM** (Astro + TailwindCSS), prêt à déployer sur Hostinger.

## Installation

```bash
npm install
```

## Développement

```bash
npm run dev
```

## Build

```bash
npm run build
```

Le build statique est généré dans `dist/`.

## Déploiement Hostinger (statique)

1. Lancez `npm run build`.
2. Uploadez le contenu du dossier `dist/` via File Manager ou FTP sur Hostinger.
3. Vérifiez que le domaine pointe vers le dossier public de votre hébergement.

## Où modifier le contenu

- Pages principales : `src/pages/`
- Réalisations : `src/data/realisations.ts`
- Blog : `src/content/blog/`
- SEO global / infos contact : `src/lib/site.ts`
- Layout & meta : `src/layouts/BaseLayout.astro`
- Styles : `src/styles/global.css` et `tailwind.config.cjs`

## Couleurs & branding

- Accent : `#5B2EFF` (voir `tailwind.config.cjs`)
- Texte principal : `#111111`
- Slogan : `Le marketing qui fait vendre (pas juste briller).`

## SEO

- Titres et descriptions uniques par page.
- JSON-LD (Organisation + Breadcrumbs + Articles).
- Sitemap auto : `/sitemap.xml`.
- Robots : `public/robots.txt`.

## Formulaire

- Sans backend par défaut (`mailto: hello@clicom.ch`).
- Option Formspree : définir `PUBLIC_FORMSPREE_ENDPOINT` dans l'environnement.
- Anti-spam : champ honeypot côté front.

## Cookies

- Aucun tracking par défaut.
- Consentement analytics stocké en localStorage (`clicom-analytics-consent`).

## Sécurité (headers recommandés)

À configurer côté hébergeur (Hostinger/Apache/Nginx) :

- `Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self';`
- `Referrer-Policy: strict-origin-when-cross-origin`
- `X-Content-Type-Options: nosniff`
- `X-Frame-Options: SAMEORIGIN`
- `Permissions-Policy: geolocation=(), microphone=(), camera=()`

> Adaptez la CSP si vous ajoutez des services tiers.

## Checklist finale (avant mise en ligne)

### Performance
- [ ] Lighthouse Performance ≥ 90
- [ ] Core Web Vitals OK (LCP, CLS, INP)
- [ ] Images optimisées et dimensions fixées

### SEO
- [ ] Titles & meta descriptions uniques
- [ ] JSON-LD valide (Organization, Breadcrumbs, Article)
- [ ] Sitemap + robots.txt accessibles

### Accessibilité (WCAG 2.2)
- [ ] Navigation clavier complète
- [ ] Focus visible sur tous les éléments interactifs
- [ ] Contraste suffisant
- [ ] Formulaire avec labels explicites

### Conformité Suisse (nLPD + cookies)
- [ ] Politique de confidentialité claire
- [ ] Bannière cookies sans dark pattern
- [ ] Consentement analytics optionnel et stocké

### Déploiement Hostinger
- [ ] `npm run build` OK
- [ ] Upload du dossier `dist/`
- [ ] Vérification 404 + pages légales
