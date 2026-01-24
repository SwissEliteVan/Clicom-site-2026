/* empty css                                   */
import { c as createComponent, r as renderComponent, a as renderTemplate, m as maybeRenderHead, d as addAttribute } from '../chunks/astro/server_BbL4JxFn.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../chunks/Footer_D8jxgJpx.mjs';
import { $ as $$CTAButton } from '../chunks/CTAButton_RvQ7QYcg.mjs';
import { r as realisations } from '../chunks/realisations_o6tNqV5G.mjs';
export { renderers } from '../renderers.mjs';

const $$Realisations = createComponent(($$result, $$props, $$slots) => {
  const sectors = [
    { id: "all", name: "Tous les projets", icon: "\u{1F3AF}" },
    { id: "restauration", name: "Restauration & H\xF4tellerie", icon: "\u{1F37D}\uFE0F" },
    { id: "b2b", name: "B2B & Services", icon: "\u{1F4BC}" },
    { id: "artisanat", name: "Artisanat & Commerce", icon: "\u{1F6E0}\uFE0F" },
    { id: "sante", name: "Sant\xE9 & Bien-\xEAtre", icon: "\u{1F3E5}" },
    { id: "immobilier", name: "Immobilier", icon: "\u{1F3E2}" },
    { id: "sport", name: "Sport & Loisirs", icon: "\u26BD" }
  ];
  const projectsBySector = {
    "restauration": ["bistro-lac"],
    "b2b": ["nexora-swiss"],
    "artisanat": ["atelier-marion"],
    "immobilier": ["mont-blanc-immobilier"],
    "sante": ["clinique-aurora"],
    "sport": ["equinox-sport"]
  };
  const detailedTestimonials = [
    {
      project: "Bistro du Lac",
      sector: "Restauration",
      name: "Sophie Martin",
      role: "G\xE9rante",
      photo: "\u{1F464}",
      quote: "Notre site \xE9tait vieillissant et ne refl\xE9tait pas la qualit\xE9 de nos prestations. Clic COM a su moderniser notre image tout en gardant l'authenticit\xE9 de notre \xE9tablissement. Les r\xE9servations en ligne ont tripl\xE9 en 3 mois.",
      results: [
        "+200% de demandes de r\xE9servation",
        "Temps de chargement divis\xE9 par 5",
        "Premi\xE8re page Google pour 'restaurant lac L\xE9man'"
      ],
      duration: "6 semaines"
    },
    {
      project: "Nexora Swiss",
      sector: "B2B",
      name: "Marc Dubois",
      role: "Directeur Commercial",
      photo: "\u{1F464}",
      quote: "Nous avions besoin d'une landing page qui convertit vraiment. L'\xE9quipe a su clarifier notre proposition de valeur et structurer notre message. Les r\xE9sultats ont d\xE9pass\xE9 nos attentes.",
      results: [
        "Taux de conversion pass\xE9 de 2% \xE0 7%",
        "+150% de demandes de d\xE9mo qualifi\xE9es",
        "Co\xFBt par lead r\xE9duit de 40%"
      ],
      duration: "3 semaines"
    },
    {
      project: "Atelier Marion",
      sector: "Artisanat",
      name: "Caroline Renaud",
      role: "Artisane",
      photo: "\u{1F464}",
      quote: "En tant qu'artisane, je n'avais ni le temps ni les comp\xE9tences pour m'occuper de ma visibilit\xE9 en ligne. L'accompagnement SEO local m'a permis d'\xEAtre enfin visible et de toucher ma client\xE8le de proximit\xE9.",
      results: [
        "Premi\xE8re place Google Maps dans ma zone",
        "+180% de visites sur le site",
        "15-20 demandes qualifi\xE9es par mois"
      ],
      duration: "8 semaines"
    }
  ];
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "Nos R\xE9alisations | Clic COM", "description": "Portfolio Clic COM : projets web et marketing orient\xE9s conversion par secteur d'activit\xE9.", "breadcrumbs": [{ name: "Accueil", item: "/" }, { name: "R\xE9alisations", item: "/realisations/" }] }, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "/realisations/" })} ${maybeRenderHead()}<main class="mx-auto max-w-6xl px-6 py-16"> <div class="space-y-4"> <h1 class="text-4xl font-semibold text-ink">Nos Réalisations</h1> <p class="text-lg text-black/70">
Découvrez nos projets par secteur d'activité. Chaque réalisation présente l'objectif, la
        solution mise en place et les résultats concrets obtenus.
</p> </div> <!-- Navigation par secteur --> <nav class="mt-10 flex flex-wrap gap-3" aria-label="Filtrer par secteur"> ${sectors.map((sector) => renderTemplate`<button type="button"${addAttribute(sector.id, "data-sector")} class="sector-filter rounded-full border border-black/10 bg-white px-4 py-2 text-sm font-semibold text-ink hover:bg-accent hover:text-white hover:border-accent transition"> ${sector.icon} ${sector.name} </button>`)} </nav> <!-- Galerie de projets --> <div class="mt-10"> <h2 class="text-2xl font-semibold text-ink mb-6">Galerie de projets</h2> <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3"> ${realisations.map((project) => renderTemplate`<article class="project-card rounded-3xl border border-black/10 bg-white p-6 shadow-soft hover:shadow-lg transition-shadow"${addAttribute(Object.keys(projectsBySector).find(
    (sector) => projectsBySector[sector].includes(project.slug)
  ), "data-sector")}> <div class="aspect-video rounded-2xl bg-gradient-to-br from-accent/10 to-accent/5 flex items-center justify-center mb-4"> <span class="text-4xl">💼</span> </div> <p class="text-xs font-semibold uppercase text-accent">${project.label}</p> <h3 class="mt-2 text-lg font-semibold text-ink">${project.title}</h3> <p class="mt-3 text-sm text-black/70">${project.goal}</p> <div class="mt-4 flex flex-wrap gap-2"> ${project.stack.map((tech) => renderTemplate`<span class="rounded-full bg-black/5 px-3 py-1 text-xs text-black/60"> ${tech} </span>`)} </div> <a class="mt-4 inline-flex text-sm font-semibold text-accent hover:underline"${addAttribute(`/realisations/${project.slug}/`, "href")}>
Voir l'étude de cas détaillée →
</a> </article>`)} </div> </div> <!-- Études de cas détaillées avec témoignages --> <div class="mt-20"> <h2 class="text-2xl font-semibold text-ink mb-6">Témoignages clients détaillés</h2> <div class="space-y-8"> ${detailedTestimonials.map((testimonial) => renderTemplate`<article class="rounded-3xl border border-black/10 bg-gradient-to-br from-white to-black/5 p-8 shadow-soft"> <div class="grid gap-8 lg:grid-cols-[2fr,1fr]"> <div> <div class="flex items-start gap-4 mb-4"> <span class="text-4xl">${testimonial.photo}</span> <div> <p class="font-semibold text-ink">${testimonial.name}</p> <p class="text-sm text-black/60">${testimonial.role}</p> <p class="text-xs font-semibold uppercase text-accent mt-1"> ${testimonial.project} · ${testimonial.sector} </p> </div> </div> <blockquote class="text-black/70 italic border-l-4 border-accent pl-4 my-6">
"${testimonial.quote}"
</blockquote> <div class="mt-4"> <p class="text-sm font-semibold text-ink mb-2">Durée du projet : ${testimonial.duration}</p> </div> </div> <div class="rounded-2xl border border-black/10 bg-white p-6"> <p class="text-sm font-semibold text-ink mb-4">Résultats mesurables :</p> <ul class="space-y-3"> ${testimonial.results.map((result) => renderTemplate`<li class="flex items-start gap-2 text-sm text-black/70"> <span class="text-accent font-bold">✓</span> <span>${result}</span> </li>`)} </ul> </div> </div> </article>`)} </div> </div> <!-- CTA final --> <div class="mt-16 flex flex-wrap items-center justify-between gap-6 rounded-3xl border border-black/10 bg-accent/5 p-8"> <div class="flex-1"> <h2 class="text-2xl font-semibold text-ink">Votre projet mérite les mêmes résultats</h2> <p class="mt-2 text-black/70">
Parlons de vos objectifs et créons ensemble une stratégie sur mesure pour votre activité.
</p> </div> ${renderComponent($$result2, "CTAButton", $$CTAButton, { "href": "/contact/", "label": "D\xE9marrer un projet" }, { "default": ($$result3) => renderTemplate`
Démarrer un projet
` })} </div> <!-- Méthodologie --> <div class="mt-16 rounded-3xl border border-black/10 bg-white p-8"> <h2 class="text-xl font-semibold text-ink mb-6">Notre approche projet</h2> <div class="grid gap-6 md:grid-cols-3"> <div class="space-y-3"> <div class="text-3xl">🎯</div> <h3 class="font-semibold text-ink">Compréhension approfondie</h3> <p class="text-sm text-black/70">
Nous prenons le temps de comprendre votre activité, vos clients et vos objectifs spécifiques.
</p> </div> <div class="space-y-3"> <div class="text-3xl">🛠️</div> <h3 class="font-semibold text-ink">Solution sur mesure</h3> <p class="text-sm text-black/70">
Chaque projet bénéficie d'une stratégie personnalisée adaptée à vos besoins et votre budget.
</p> </div> <div class="space-y-3"> <div class="text-3xl">📊</div> <h3 class="font-semibold text-ink">Résultats mesurables</h3> <p class="text-sm text-black/70">
Nous fixons des KPIs clairs dès le départ et suivons l'évolution pour optimiser en continu.
</p> </div> </div> </div> </main>  ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
}, "C:/Git/Clicom-site-2026/src/pages/realisations.astro", void 0);

const $$file = "C:/Git/Clicom-site-2026/src/pages/realisations.astro";
const $$url = "/realisations";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Realisations,
  file: $$file,
  url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
