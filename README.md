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

## Cookies

- Aucun tracking par défaut.
- Consentement analytics stocké en localStorage (`clicom-analytics-consent`).

