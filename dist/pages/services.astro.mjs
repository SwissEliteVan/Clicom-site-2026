/* empty css                                   */
import { c as createComponent, r as renderComponent, a as renderTemplate, m as maybeRenderHead, d as addAttribute } from '../chunks/astro/server_BbL4JxFn.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../chunks/Footer_Cu2PibUr.mjs';
import { $ as $$CTAButton } from '../chunks/CTAButton_DKlGdm8N.mjs';
export { renderers } from '../renderers.mjs';

const $$Services = createComponent(($$result, $$props, $$slots) => {
  const services = [
    {
      id: "seo",
      title: "\xCAtre mieux visible sur Google",
      subtitle: "Optimisation pour les moteurs de recherche (SEO)",
      description: "Am\xE9liorez votre positionnement naturel sur Google et attirez des visiteurs qualifi\xE9s sans publicit\xE9 payante.",
      icon: "\u{1F50D}",
      subsections: [
        {
          title: "Audit de visibilit\xE9 gratuit",
          description: "Analyse compl\xE8te de votre pr\xE9sence en ligne pour identifier les opportunit\xE9s d'am\xE9lioration et les points bloquants.",
          benefits: [
            "Analyse de votre positionnement actuel",
            "Identification des opportunit\xE9s",
            "Recommandations personnalis\xE9es",
            "Plan d'action prioris\xE9"
          ]
        },
        {
          title: "Optimisation du contenu",
          description: "Cr\xE9ation et optimisation de contenus qui r\xE9pondent aux recherches de vos clients potentiels.",
          benefits: [
            "Recherche de mots-cl\xE9s pertinents",
            "R\xE9daction SEO orient\xE9e conversion",
            "Optimisation des pages existantes",
            "Contenu local cibl\xE9"
          ]
        },
        {
          title: "Am\xE9lioration technique du site",
          description: "Optimisation technique pour un site rapide, bien structur\xE9 et appr\xE9ci\xE9 par Google.",
          benefits: [
            "Vitesse de chargement optimis\xE9e",
            "Structure technique propre",
            "Compatibilit\xE9 mobile parfaite",
            "Optimisation Core Web Vitals"
          ]
        }
      ]
    },
    {
      id: "sea",
      title: "Publicit\xE9s en ligne cibl\xE9es",
      subtitle: "Campagnes publicitaires payantes (SEA)",
      description: "Des campagnes publicitaires bien cadr\xE9es pour g\xE9n\xE9rer rapidement des leads qualifi\xE9s avec un budget ma\xEEtris\xE9.",
      icon: "\u{1F3AF}",
      subsections: [
        {
          title: "Campagnes Google Ads",
          description: "Apparaissez en t\xEAte des r\xE9sultats Google pour capter vos clients au moment o\xF9 ils cherchent vos services.",
          benefits: [
            "Audit et restructuration de compte",
            "Ciblage pr\xE9cis et performant",
            "Optimisation continue du budget",
            "Suivi des conversions d\xE9taill\xE9"
          ]
        },
        {
          title: "Publicit\xE9s sur les r\xE9seaux sociaux",
          description: "Touchez votre audience sur Facebook, Instagram et LinkedIn avec des campagnes visuelles percutantes.",
          benefits: [
            "Strat\xE9gie de ciblage avanc\xE9e",
            "Cr\xE9ation de visuels attractifs",
            "Tests A/B syst\xE9matiques",
            "Reporting transparent"
          ]
        },
        {
          title: "Campagnes locales",
          description: "Maximisez votre visibilit\xE9 locale avec des campagnes g\xE9olocalis\xE9es sur Google Maps et les r\xE9seaux sociaux.",
          benefits: [
            "Ciblage g\xE9ographique pr\xE9cis",
            "Optimisation Google Business Profile",
            "Publicit\xE9s locales sur Maps",
            "Suivi des visites en magasin"
          ]
        }
      ]
    },
    {
      id: "website",
      title: "Cr\xE9ation de site internet sur mesure",
      subtitle: "Sites web performants et orient\xE9s conversion",
      description: "Des sites rapides, modernes et optimis\xE9s pour transformer vos visiteurs en clients.",
      icon: "\u{1F4BB}",
      subsections: [
        {
          title: "Sites vitrines",
          description: "Un site \xE9l\xE9gant et professionnel qui pr\xE9sente votre activit\xE9 et g\xE9n\xE8re des demandes de contact.",
          benefits: [
            "Design moderne et sur mesure",
            "Performance et vitesse optimales",
            "SEO int\xE9gr\xE9 d\xE8s la conception",
            "Responsive parfait sur tous \xE9crans"
          ]
        },
        {
          title: "Boutiques en ligne",
          description: "Une boutique e-commerce compl\xE8te pour vendre vos produits en ligne efficacement.",
          benefits: [
            "Tunnel de vente optimis\xE9",
            "Paiements s\xE9curis\xE9s",
            "Gestion de stock simplifi\xE9e",
            "Int\xE9gration logistique"
          ]
        },
        {
          title: "Refonte de site existant",
          description: "Modernisez votre site actuel pour am\xE9liorer performances, design et conversion.",
          benefits: [
            "Analyse de l'existant",
            "Migration sans perte de SEO",
            "Am\xE9lioration UX/UI",
            "Performance technique accrue"
          ]
        }
      ]
    },
    {
      id: "social-media",
      title: "Gestion de votre pr\xE9sence sur les r\xE9seaux sociaux",
      subtitle: "Community management et strat\xE9gie social media",
      description: "D\xE9veloppez et animez votre communaut\xE9 sur les r\xE9seaux sociaux pour renforcer votre image de marque.",
      icon: "\u{1F4F1}",
      subsections: [
        {
          title: "Strat\xE9gie de contenu",
          description: "Un plan \xE9ditorial coh\xE9rent align\xE9 sur vos objectifs business et les attentes de votre audience.",
          benefits: [
            "Audit de votre pr\xE9sence actuelle",
            "Calendrier \xE9ditorial personnalis\xE9",
            "Ligne \xE9ditoriale d\xE9finie",
            "Objectifs mesurables"
          ]
        },
        {
          title: "Animation communautaire",
          description: "Gestion quotidienne de vos r\xE9seaux pour cr\xE9er de l'engagement et fid\xE9liser votre audience.",
          benefits: [
            "Publication r\xE9guli\xE8re",
            "R\xE9ponses aux commentaires",
            "Gestion de la r\xE9putation",
            "Reporting mensuel"
          ]
        },
        {
          title: "Cr\xE9ation graphique",
          description: "Des visuels percutants et coh\xE9rents avec votre identit\xE9 de marque pour maximiser l'impact.",
          benefits: [
            "Designs adapt\xE9s \xE0 chaque plateforme",
            "Templates r\xE9utilisables",
            "Vid\xE9os courtes engageantes",
            "Stories et Reels cr\xE9atifs"
          ]
        }
      ]
    }
  ];
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "Nos Solutions | Clic COM", "description": "Sites rapides, SEO local, publicit\xE9s et automatisations pour convertir en Suisse.", "breadcrumbs": [{ name: "Accueil", item: "/" }, { name: "Nos Solutions", item: "/services/" }] }, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "/services/" })} ${maybeRenderHead()}<main class="mx-auto max-w-6xl px-6 py-16"> <div class="space-y-4"> <h1 class="text-4xl font-semibold text-ink">Nos Solutions</h1> <p class="text-lg text-black/70">
Des prestations ciblées pour développer votre activité en ligne, avec une exécution rapide et
        mesurable. Chaque solution est conçue pour vous apporter des résultats concrets.
</p> </div> <nav class="mt-10 flex flex-wrap gap-3" aria-label="Navigation des solutions"> ${services.map((service) => renderTemplate`<a${addAttribute(`#${service.id}`, "href")} class="rounded-full border border-black/10 bg-white px-4 py-2 text-sm font-semibold text-ink hover:bg-accent hover:text-white hover:border-accent transition"> ${service.icon} ${service.title} </a>`)} </nav> <div class="mt-16 space-y-20"> ${services.map((service) => renderTemplate`<section${addAttribute(service.id, "id")} class="scroll-mt-8"> <div class="rounded-3xl border border-black/10 bg-gradient-to-br from-white to-black/5 p-8 shadow-soft"> <div class="flex items-start gap-4"> <span class="text-4xl">${service.icon}</span> <div class="flex-1"> <h2 class="text-3xl font-semibold text-ink">${service.title}</h2> <p class="mt-1 text-sm font-medium text-accent">${service.subtitle}</p> <p class="mt-3 text-black/70">${service.description}</p> </div> </div> <div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3"> ${service.subsections.map((subsection) => renderTemplate`<article class="rounded-2xl border border-black/10 bg-white p-6 shadow-soft"> <h3 class="text-lg font-semibold text-ink">${subsection.title}</h3> <p class="mt-3 text-sm text-black/70">${subsection.description}</p> <div class="mt-4 border-t border-black/10 pt-4"> <p class="text-xs font-semibold text-ink">Points clés :</p> <ul class="mt-2 space-y-2"> ${subsection.benefits.map((benefit) => renderTemplate`<li class="text-xs text-black/70">✓ ${benefit}</li>`)} </ul> </div> </article>`)} </div> </div> </section>`)} </div> <div class="mt-16 flex flex-wrap items-center justify-between gap-6 rounded-3xl border border-black/10 bg-accent/5 p-8"> <div class="flex-1"> <h2 class="text-2xl font-semibold text-ink">Besoin d'un plan sur mesure ?</h2> <p class="mt-2 text-black/70">
Décrivez votre contexte, nous revenons avec un plan d'action concret et un devis transparent.
</p> </div> ${renderComponent($$result2, "CTAButton", $$CTAButton, { "href": "/contact/", "label": "Demander un devis" }, { "default": ($$result3) => renderTemplate`
Demander un devis
` })} </div> <div class="mt-16 rounded-3xl border border-black/10 bg-white p-8"> <h2 class="text-xl font-semibold text-ink">Notre méthode de travail</h2> <div class="mt-6 grid gap-6 md:grid-cols-4"> <div class="space-y-2"> <div class="text-3xl font-bold text-accent">01</div> <h3 class="font-semibold text-ink">Audit & Cadrage</h3> <p class="text-sm text-black/70">Analyse de votre situation et définition des objectifs prioritaires.</p> </div> <div class="space-y-2"> <div class="text-3xl font-bold text-accent">02</div> <h3 class="font-semibold text-ink">Proposition</h3> <p class="text-sm text-black/70">Plan d'action détaillé avec devis transparent et délais réalistes.</p> </div> <div class="space-y-2"> <div class="text-3xl font-bold text-accent">03</div> <h3 class="font-semibold text-ink">Exécution</h3> <p class="text-sm text-black/70">Mise en œuvre rapide avec points d'étape réguliers et validations.</p> </div> <div class="space-y-2"> <div class="text-3xl font-bold text-accent">04</div> <h3 class="font-semibold text-ink">Optimisation</h3> <p class="text-sm text-black/70">Analyse des résultats et ajustements pour maximiser la performance.</p> </div> </div> </div> </main> ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
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
