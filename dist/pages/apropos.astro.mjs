/* empty css                                   */
import { b as createAstro, c as createComponent, r as renderComponent, a as renderTemplate, m as maybeRenderHead, d as addAttribute } from '../chunks/astro/server_BbL4JxFn.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../chunks/Footer_h6LQB7Eu.mjs';
import { $ as $$CTAButton } from '../chunks/CTAButton_RvQ7QYcg.mjs';
import { s as site } from '../chunks/site_CV2KWidJ.mjs';
export { renderers } from '../renderers.mjs';

const $$Astro = createAstro("https://clicom.ch");
const $$Apropos = createComponent(($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro, $$props, $$slots);
  Astro2.self = $$Apropos;
  const values = [
    {
      icon: "\u{1F3AF}",
      title: "Performance mesurable",
      description: "Chaque action est orient\xE9e vers des r\xE9sultats concrets et mesurables. Pas de blabla, que des faits."
    },
    {
      icon: "\u26A1",
      title: "Rapidit\xE9 d'ex\xE9cution",
      description: "Nous valorisons votre temps. Des d\xE9lais courts, une mise en \u0153uvre rapide, sans sacrifier la qualit\xE9."
    },
    {
      icon: "\u{1F91D}",
      title: "Transparence totale",
      description: "Communication claire sur les actions men\xE9es, les budgets et les r\xE9sultats. Z\xE9ro surprise."
    },
    {
      icon: "\u{1F4A1}",
      title: "Innovation pragmatique",
      description: "Les derni\xE8res techniques, mais seulement celles qui apportent une vraie valeur ajout\xE9e."
    }
  ];
  const team = [
    {
      name: "Sarah Dupont",
      role: "Directrice & Strat\xE8ge Marketing",
      photo: "\u{1F469}\u200D\u{1F4BC}",
      bio: "10 ans d'exp\xE9rience en marketing digital. Sp\xE9cialiste en acquisition clients et optimisation de conversion.",
      expertise: ["Strat\xE9gie digitale", "SEO/SEA", "Conversion"]
    },
    {
      name: "Thomas Bernard",
      role: "D\xE9veloppeur Web Senior",
      photo: "\u{1F468}\u200D\u{1F4BB}",
      bio: "Expert en d\xE9veloppement web moderne. Passionn\xE9 par la performance et l'exp\xE9rience utilisateur.",
      expertise: ["Astro", "React", "Performance Web"]
    },
    {
      name: "Julie Moreau",
      role: "Designer UX/UI",
      photo: "\u{1F469}\u200D\u{1F3A8}",
      bio: "Designer focalis\xE9e sur l'exp\xE9rience utilisateur et l'identit\xE9 visuelle orient\xE9e conversion.",
      expertise: ["UX Design", "UI Design", "Branding"]
    },
    {
      name: "Antoine Petit",
      role: "Sp\xE9cialiste SEO & Contenu",
      photo: "\u{1F468}\u200D\u{1F4DD}",
      bio: "Expert en r\xE9f\xE9rencement naturel et cr\xE9ation de contenu. Sp\xE9cialiste du SEO local pour la Suisse romande.",
      expertise: ["SEO Local", "Copywriting", "Analytics"]
    }
  ];
  const methodology = [
    {
      step: "01",
      title: "Audit & Diagnostic",
      description: "Analyse approfondie de votre situation actuelle : pr\xE9sence en ligne, concurrence, opportunit\xE9s.",
      deliverables: ["Audit complet", "Recommandations prioritaires", "Plan d'action initial"]
    },
    {
      step: "02",
      title: "Strat\xE9gie & Proposition",
      description: "\xC9laboration d'une strat\xE9gie personnalis\xE9e avec objectifs clairs, budget transparent et planning r\xE9aliste.",
      deliverables: ["Proposition d\xE9taill\xE9e", "Devis transparent", "Calendrier de r\xE9alisation"]
    },
    {
      step: "03",
      title: "Ex\xE9cution & Suivi",
      description: "Mise en \u0153uvre rapide avec points d'\xE9tape r\xE9guliers, validations et ajustements si n\xE9cessaire.",
      deliverables: ["Livrables selon planning", "Rapports hebdomadaires", "Points de synchronisation"]
    },
    {
      step: "04",
      title: "Optimisation Continue",
      description: "Analyse des performances, ajustements bas\xE9s sur les donn\xE9es et am\xE9lioration continue des r\xE9sultats.",
      deliverables: ["Analyses mensuelles", "Recommandations d'optimisation", "Support continu"]
    }
  ];
  const commitments = [
    {
      icon: "\u23F1\uFE0F",
      title: "Respect des d\xE9lais",
      description: "Nous nous engageons sur des d\xE9lais r\xE9alistes et les respectons. Planning transparent d\xE8s le d\xE9part."
    },
    {
      icon: "\u{1F4DE}",
      title: "Communication claire",
      description: "R\xE9ponse sous 24h en semaine. Points r\xE9guliers sur l'avancement de votre projet."
    },
    {
      icon: "\u{1F4B0}",
      title: "Budget ma\xEEtris\xE9",
      description: "Devis d\xE9taill\xE9 sans frais cach\xE9s. Transparence totale sur les co\xFBts et les prestations."
    },
    {
      icon: "\u{1F512}",
      title: "Conformit\xE9 & s\xE9curit\xE9",
      description: "Respect de la nLPD (loi suisse sur la protection des donn\xE9es) et des standards de s\xE9curit\xE9."
    },
    {
      icon: "\u{1F4C8}",
      title: "R\xE9sultats garantis",
      description: "Objectifs d\xE9finis ensemble. Si nous ne sommes pas \xE0 la hauteur, nous corrigeons sans surco\xFBt."
    },
    {
      icon: "\u{1F393}",
      title: "Formation & autonomie",
      description: "Nous vous formons pour que vous puissiez g\xE9rer le quotidien en autonomie si vous le souhaitez."
    }
  ];
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "L'Agence | Clic COM", "description": "Agence marketing & web en Suisse orient\xE9e r\xE9sultats, performance et conversion. Notre \xE9quipe, nos valeurs, notre m\xE9thode.", "breadcrumbs": [{ name: "Accueil", item: "/" }, { name: "L'Agence", item: "/apropos/" }] }, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "/apropos/" })} ${maybeRenderHead()}<main class="mx-auto max-w-6xl px-6 py-16"> <!-- En-tête --> <div class="space-y-4"> <h1 class="text-4xl font-semibold text-ink">L'Agence</h1> <p class="text-xl text-black/70">
Une équipe passionnée, des méthodes éprouvées et un seul objectif : des résultats concrets pour votre entreprise.
</p> </div> <!-- Notre histoire & valeurs --> <section class="mt-16"> <div class="rounded-3xl border border-black/10 bg-gradient-to-br from-white to-black/5 p-8 shadow-soft"> <h2 class="text-3xl font-semibold text-ink">Notre histoire</h2> <div class="mt-6 space-y-4 text-black/70"> <p>
Clic COM est née d'un constat simple : trop de PME suisses investissent dans le marketing digital sans obtenir de résultats mesurables. Trop de promesses, pas assez de concret.
</p> <p>
Notre mission est de changer cela. Nous croyons qu'une stratégie digitale efficace doit être claire, mesurable et orientée vers un seul objectif : générer plus de clients.
</p> <p>
Basée en Suisse romande, notre agence accompagne des PME et indépendants qui veulent développer leur activité grâce au digital, sans perdre de temps ni d'argent dans des stratégies compliquées.
</p> </div> </div> </section> <!-- Nos valeurs --> <section class="mt-16"> <h2 class="text-3xl font-semibold text-ink mb-8">Nos valeurs & expertise</h2> <div class="grid gap-6 md:grid-cols-2"> ${values.map((value) => renderTemplate`<article class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft"> <div class="text-4xl mb-4">${value.icon}</div> <h3 class="text-xl font-semibold text-ink">${value.title}</h3> <p class="mt-3 text-sm text-black/70">${value.description}</p> </article>`)} </div> </section> <!-- Notre équipe --> <section class="mt-16"> <h2 class="text-3xl font-semibold text-ink mb-8">Notre équipe</h2> <p class="text-black/70 mb-10">
Une équipe complémentaire de spécialistes passionnés par le digital et orientés résultats.
</p> <div class="grid gap-8 md:grid-cols-2"> ${team.map((member) => renderTemplate`<article class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft"> <div class="flex items-start gap-4"> <div class="text-5xl">${member.photo}</div> <div class="flex-1"> <h3 class="text-xl font-semibold text-ink">${member.name}</h3> <p class="text-sm font-medium text-accent">${member.role}</p> </div> </div> <p class="mt-4 text-sm text-black/70">${member.bio}</p> <div class="mt-4 flex flex-wrap gap-2"> ${member.expertise.map((skill) => renderTemplate`<span class="rounded-full bg-accent/10 px-3 py-1 text-xs font-medium text-accent"> ${skill} </span>`)} </div> </article>`)} </div> <div class="mt-8 rounded-2xl border border-black/10 bg-black/5 p-6"> <p class="text-sm text-black/70"> <strong class="text-ink">Note :</strong> Les photos d'équipe authentiques sont en cours d'intégration. Cette section sera mise à jour dès réception des visuels.
</p> </div> </section> <!-- Notre méthode de travail --> <section class="mt-16"> <h2 class="text-3xl font-semibold text-ink mb-8">Notre méthode de travail</h2> <p class="text-black/70 mb-10">
Une approche structurée en 4 étapes pour garantir des résultats concrets et mesurables.
</p> <div class="space-y-6"> ${methodology.map((phase) => renderTemplate`<article class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft"> <div class="grid gap-6 lg:grid-cols-[1fr,2fr]"> <div> <div class="text-4xl font-bold text-accent mb-2">${phase.step}</div> <h3 class="text-xl font-semibold text-ink">${phase.title}</h3> </div> <div> <p class="text-black/70 mb-4">${phase.description}</p> <div class="border-t border-black/10 pt-4"> <p class="text-xs font-semibold text-ink mb-2">Livrables :</p> <ul class="space-y-1"> ${phase.deliverables.map((deliverable) => renderTemplate`<li class="text-sm text-black/70">✓ ${deliverable}</li>`)} </ul> </div> </div> </div> </article>`)} </div> </section> <!-- Nos engagements --> <section class="mt-16"> <h2 class="text-3xl font-semibold text-ink mb-8">Nos engagements</h2> <p class="text-black/70 mb-10">
Des promesses claires que nous tenons sur chaque projet. Votre réussite est notre priorité.
</p> <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3"> ${commitments.map((commitment) => renderTemplate`<article class="rounded-2xl border border-black/10 bg-white p-6 shadow-soft"> <div class="text-3xl mb-3">${commitment.icon}</div> <h3 class="font-semibold text-ink">${commitment.title}</h3> <p class="mt-2 text-sm text-black/70">${commitment.description}</p> </article>`)} </div> </section> <!-- Certifications & partenariats --> <section class="mt-16 rounded-3xl border border-black/10 bg-gradient-to-br from-white to-black/5 p-8"> <h2 class="text-2xl font-semibold text-ink mb-4">Certifications & Partenariats</h2> <div class="grid gap-6 md:grid-cols-3"> <div class="text-center"> <div class="text-4xl mb-2">🎓</div> <p class="font-semibold text-ink">Google Partner</p> <p class="text-xs text-black/60 mt-1">Certifié Google Ads</p> </div> <div class="text-center"> <div class="text-4xl mb-2">⚡</div> <p class="font-semibold text-ink">Meta Business Partner</p> <p class="text-xs text-black/60 mt-1">Spécialiste publicités sociales</p> </div> <div class="text-center"> <div class="text-4xl mb-2">🇨🇭</div> <p class="font-semibold text-ink">Conformité nLPD</p> <p class="text-xs text-black/60 mt-1">Protection des données suisse</p> </div> </div> </section> <!-- Coordonnées --> <section class="mt-16 rounded-3xl border border-black/10 bg-white p-8"> <h2 class="text-2xl font-semibold text-ink mb-6">Nous contacter</h2> <div class="grid gap-6 md:grid-cols-2"> <div class="space-y-3"> <div> <p class="text-sm font-semibold text-ink">Email</p> <a class="text-accent hover:underline"${addAttribute(`mailto:${site.email}`, "href")}>${site.email}</a> </div> <div> <p class="text-sm font-semibold text-ink">Téléphone</p> <a class="text-accent hover:underline"${addAttribute(`tel:${site.phone.replace(/\s+/g, "")}`, "href")}>${site.phone}</a> </div> <div> <p class="text-sm font-semibold text-ink">Site web</p> <a class="text-accent hover:underline"${addAttribute(site.url, "href")}>${site.url}</a> </div> </div> <div class="rounded-2xl border border-black/10 bg-black/5 p-4"> <p class="text-sm font-semibold text-ink mb-2">Horaires de disponibilité</p> <ul class="text-sm text-black/70 space-y-1"> <li>Lundi - Vendredi : 9h00 - 18h00</li> <li>Samedi : Sur rendez-vous</li> <li>Dimanche : Fermé</li> </ul> <p class="text-xs text-black/60 mt-3">
Réponse aux emails sous 24h en semaine
</p> </div> </div> <div class="mt-6 rounded-2xl border border-black/10 bg-white p-4"> <p class="text-xs font-semibold text-ink mb-2">Localisation</p> <p class="text-xs text-black/60">
Basé en Suisse romande. Interventions possibles dans toute la Suisse francophone et au-delà pour les projets digitaux.
</p> </div> </section> <!-- CTA final --> <div class="mt-16 flex flex-wrap items-center justify-between gap-6 rounded-3xl border border-black/10 bg-accent/5 p-8"> <div class="flex-1"> <h2 class="text-2xl font-semibold text-ink">Prêt à collaborer ?</h2> <p class="mt-2 text-black/70">
Parlons de votre projet et voyons comment nous pouvons vous aider à atteindre vos objectifs.
</p> </div> ${renderComponent($$result2, "CTAButton", $$CTAButton, { "href": "/contact/", "label": "D\xE9marrer un projet" }, { "default": ($$result3) => renderTemplate`
Démarrer un projet
` })} </div> </main> ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
}, "C:/Git/Clicom-site-2026/src/pages/apropos.astro", void 0);

const $$file = "C:/Git/Clicom-site-2026/src/pages/apropos.astro";
const $$url = "/apropos";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Apropos,
  file: $$file,
  url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
