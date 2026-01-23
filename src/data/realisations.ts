export type Realisation = {
  slug: string;
  title: string;
  label: string;
  goal: string;
  solution: string;
  stack: string[];
  results: string[];
};

export const realisations: Realisation[] = [
  {
    slug: "bistro-lac",
    title: "Bistro du Lac",
    label: "Site vitrine + réservation",
    goal: "Clarifier l'offre et générer des demandes de réservation sans friction.",
    solution:
      "Création d'un site rapide avec CTA visibles, menu structuré et formulaire simplifié.",
    stack: ["Astro", "TailwindCSS", "SEO local"],
    results: [
      "Parcours plus fluide sur mobile",
      "Meilleure compréhension des services",
      "Demandes entrantes plus qualifiées",
    ],
  },
  {
    slug: "nexora-swiss",
    title: "Nexora Swiss",
    label: "Landing page B2B",
    goal: "Convertir des visiteurs en demandes de démo sans discours inutile.",
    solution:
      "Landing page orientée bénéfices, preuves sociales et capture de leads.",
    stack: ["Astro", "Copywriting", "Tracking light"],
    results: [
      "Message principal clarifié",
      "Meilleure lisibilité des offres",
      "Plus de prises de contact",
    ],
  },
  {
    slug: "atelier-marion",
    title: "Atelier Marion",
    label: "SEO local + contenus",
    goal: "Remonter dans les recherches locales et gagner en visibilité.",
    solution:
      "Optimisation Google Business Profile et production de contenus ciblés.",
    stack: ["SEO local", "Copywriting", "Optimisation GBP"],
    results: [
      "Visibilité locale renforcée",
      "Trafic qualifié plus régulier",
      "Image de marque harmonisée",
    ],
  },
  {
    slug: "mont-blanc-immobilier",
    title: "Mont-Blanc Immobilier",
    label: "Refonte UX + performance",
    goal: "Mettre en valeur les biens et simplifier la prise de contact.",
    solution:
      "Refonte de la navigation, pages rapides, formulaires courts.",
    stack: ["Astro", "UX", "Performance"],
    results: [
      "Temps de chargement réduit",
      "Navigation plus intuitive",
      "Leads plus qualifiés",
    ],
  },
  {
    slug: "clinique-aurora",
    title: "Clinique Aurora",
    label: "Automatisation CRM lite",
    goal: "Réduire la saisie manuelle et accélérer le suivi prospects.",
    solution:
      "Automations simples reliées au formulaire et pipeline léger.",
    stack: ["Automatisation", "CRM lite", "Formulaires"],
    results: [
      "Suivi plus rapide",
      "Moins d'erreurs manuelles",
      "Process commercial clarifié",
    ],
  },
  {
    slug: "equinox-sport",
    title: "Equinox Sport",
    label: "Publicité + landing",
    goal: "Cadrer les campagnes payantes et clarifier la proposition.",
    solution:
      "Audit des campagnes, nouvelles annonces et landing dédiée.",
    stack: ["Meta Ads", "Google Ads", "Landing"],
    results: [
      "Trafic mieux ciblé",
      "Coûts maîtrisés",
      "Meilleur alignement annonce/page",
    ],
  },
];
