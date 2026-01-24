/* empty css                                   */
import { c as createComponent, r as renderComponent, a as renderTemplate, m as maybeRenderHead } from '../chunks/astro/server_PoaPgSBg.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../chunks/Footer_WL_g8g0y.mjs';
import { $ as $$CTAButton } from '../chunks/CTAButton_BQd-S80j.mjs';
export { renderers } from '../renderers.mjs';

const $$Services = createComponent(($$result, $$props, $$slots) => {
  const services = [
    {
      title: "Site vitrine ultra-performant",
      benefits: "Am\xE9liore la cr\xE9dibilit\xE9, le SEO et la vitesse pour convertir plus vite.",
      deliverables: [
        "Architecture claire et scalable",
        "Optimisation Core Web Vitals",
        "Pages strat\xE9giques + CTA"
      ],
      process: "Atelier de cadrage \u2192 wireframe \u2192 design \u2192 int\xE9gration \u2192 mise en ligne.",
      timeline: "D\xE9lais ajust\xE9s selon le volume de pages et vos validations."
    },
    {
      title: "Landing pages conversion",
      benefits: "Augmente les demandes entrantes gr\xE2ce \xE0 un message focalis\xE9.",
      deliverables: ["Message unique", "Preuves sociales", "Tracking l\xE9ger"],
      process: "Analyse offre \u2192 copywriting \u2192 maquette \u2192 it\xE9rations rapides.",
      timeline: "Mise en ligne rapide apr\xE8s validation du contenu."
    },
    {
      title: "SEO local",
      benefits: "Renforce la visibilit\xE9 locale sur Google et Maps.",
      deliverables: [
        "Optimisation Google Business Profile",
        "Plan \xE9ditorial local",
        "Pages locales optimis\xE9es"
      ],
      process: "Audit \u2192 optimisation \u2192 contenu \u2192 suivi mensuel.",
      timeline: "Travail continu, premiers signaux visibles en quelques semaines."
    },
    {
      title: "Publicit\xE9 Meta/Google",
      benefits: "Des campagnes cadr\xE9es, avec un budget ma\xEEtris\xE9 et des leads cibl\xE9s.",
      deliverables: ["Audit compte", "Structure campagnes", "Optimisation hebdo"],
      process: "Cadrage objectifs \u2192 param\xE9trage \u2192 optimisation.",
      timeline: "D\xE9marrage rapide, ajustements continus selon performance."
    },
    {
      title: "Automatisation & CRM Lite",
      benefits: "R\xE9duit la saisie manuelle et acc\xE9l\xE8re le suivi commercial.",
      deliverables: ["Formulaires connect\xE9s", "Automations simples", "Pipeline l\xE9ger"],
      process: "Cartographie \u2192 sc\xE9narios \u2192 int\xE9gration \u2192 tests.",
      timeline: "Mise en place progressive selon complexit\xE9."
    },
    {
      title: "Contenu & branding",
      benefits: "Clarifie votre positionnement et augmente la conversion.",
      deliverables: ["Copywriting", "Ton de marque", "Guidelines"],
      process: "Atelier identit\xE9 \u2192 r\xE9daction \u2192 ajustements.",
      timeline: "Livraison par it\xE9rations courtes."
    }
  ];
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "Services | Clic COM", "description": "Sites rapides, SEO local, publicit\xE9s et automatisations pour convertir en Suisse.", "breadcrumbs": [{ name: "Accueil", item: "/" }, { name: "Services", item: "/services/" }] }, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "/services/" })} ${maybeRenderHead()}<main class="mx-auto max-w-6xl px-6 py-16"> <div class="space-y-4"> <h1 class="text-4xl font-semibold text-ink">Services</h1> <p class="text-lg text-black/70">
Des prestations ciblées pour vendre plus vite, avec une exécution rapide et
        mesurable.
</p> </div> <div class="mt-10 grid gap-6"> ${services.map((service) => renderTemplate`<section class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft"> <h2 class="text-2xl font-semibold text-ink">${service.title}</h2> <p class="mt-2 text-black/70">${service.benefits}</p> <div class="mt-4 grid gap-4 md:grid-cols-3"> <div> <p class="text-sm font-semibold">Livrables</p> <ul class="mt-2 space-y-1 text-sm text-black/70"> ${service.deliverables.map((deliverable) => renderTemplate`<li>• ${deliverable}</li>`)} </ul> </div> <div> <p class="text-sm font-semibold">Process</p> <p class="mt-2 text-sm text-black/70">${service.process}</p> </div> <div> <p class="text-sm font-semibold">Délais indicatifs</p> <p class="mt-2 text-sm text-black/70">${service.timeline}</p> </div> </div> </section>`)} </div> <div class="mt-12 flex flex-wrap items-center justify-between gap-4 rounded-3xl border border-black/10 bg-black/5 p-8"> <div> <p class="text-xl font-semibold text-ink">Besoin d'un plan clair ?</p> <p class="text-sm text-black/70">
Décrivez votre contexte, nous revenons avec un plan d'action concret.
</p> </div> ${renderComponent($$result2, "CTAButton", $$CTAButton, { "href": "/contact/", "label": "Demander un devis" }, { "default": ($$result3) => renderTemplate`
Demander un devis
` })} </div> </main> ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
}, "C:/Git/Clicom-site-2026/src/pages/services.astro", void 0);

const $$file = "C:/Git/Clicom-site-2026/src/pages/services.astro";
const $$url = "/services";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Services,
  file: $$file,
  url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
