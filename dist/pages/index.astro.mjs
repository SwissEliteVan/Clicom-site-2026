/* empty css                                   */
import { b as createAstro, c as createComponent, m as maybeRenderHead, a as renderTemplate, d as addAttribute, e as renderSlot, r as renderComponent } from '../chunks/astro/server_BbL4JxFn.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../chunks/Footer_h6LQB7Eu.mjs';
import { $ as $$CTAButton } from '../chunks/CTAButton_RvQ7QYcg.mjs';
import 'clsx';
/* empty css                                 */
import { r as realisations } from '../chunks/realisations_o6tNqV5G.mjs';
import { s as site } from '../chunks/site_CV2KWidJ.mjs';
import { g as getCollection } from '../chunks/_astro_content_CMUDcPNX.mjs';
export { renderers } from '../renderers.mjs';

const $$Astro$3 = createAstro("https://clicom.ch");
const $$FaqAccordion = createComponent(($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$3, $$props, $$slots);
  Astro2.self = $$FaqAccordion;
  const { items } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<div class="space-y-4"> ${items.map((item) => renderTemplate`<details class="rounded-2xl border border-black/10 px-5 py-4"> <summary class="cursor-pointer text-sm font-semibold text-ink"> ${item.question} </summary> <p class="mt-3 text-sm text-black/70">${item.answer}</p> </details>`)} </div>`;
}, "C:/Git/Clicom-site-2026/src/components/FaqAccordion.astro", void 0);

const $$Astro$2 = createAstro("https://clicom.ch");
const $$TechCard = createComponent(($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$2, $$props, $$slots);
  Astro2.self = $$TechCard;
  const {
    variant = "default",
    padding = "md",
    hover = true,
    class: className = ""
  } = Astro2.props;
  const paddingClasses = {
    sm: "p-4",
    md: "p-6",
    lg: "p-8",
    xl: "p-12"
  };
  const variantClasses = {
    default: "tech-card-default",
    elevated: "tech-card-elevated",
    outlined: "tech-card-outlined",
    glass: "tech-card-glass"
  };
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(`tech-card ${variantClasses[variant]} ${paddingClasses[padding]} ${hover ? "tech-card-hover" : ""} ${className}`, "class")} data-astro-cid-5n2kg7ke> ${renderSlot($$result, $$slots["default"])} </div> `;
}, "C:/Git/Clicom-site-2026/src/components/TechCard.astro", void 0);

const $$Astro$1 = createAstro("https://clicom.ch");
const $$TechBackground = createComponent(($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$1, $$props, $$slots);
  Astro2.self = $$TechBackground;
  const {
    variant = "grid",
    overlay = false,
    class: className = ""
  } = Astro2.props;
  const variantClasses = {
    grid: "tech-bg-grid",
    gradient: "tech-bg-gradient",
    radial: "tech-bg-radial",
    dots: "tech-bg-dots",
    lines: "tech-bg-lines"
  };
  return renderTemplate`${maybeRenderHead()}<div${addAttribute(`tech-background ${variantClasses[variant]} ${overlay ? "tech-bg-overlay" : ""} ${className}`, "class")} data-astro-cid-rnxhnrdj> ${renderSlot($$result, $$slots["default"])} </div> `;
}, "C:/Git/Clicom-site-2026/src/components/TechBackground.astro", void 0);

const $$Astro = createAstro("https://clicom.ch");
const $$Index = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro, $$props, $$slots);
  Astro2.self = $$Index;
  const blogPosts = await getCollection("blog");
  const latestPosts = blogPosts.sort(
    (a, b) => new Date(b.data.pubDate).getTime() - new Date(a.data.pubDate).getTime()
  ).slice(0, 3);
  const services = [
    {
      title: "Site vitrine ultra-performant",
      description: "SEO propre, vitesse maximale, structure pr\xEAte \xE0 convertir."
    },
    {
      title: "Landing pages conversion",
      description: "Pages focalis\xE9es sur l'action avec message clair et CTA visibles."
    },
    {
      title: "SEO local",
      description: "Optimisation Google Business Profile et contenus locaux cibl\xE9s."
    },
    {
      title: "Publicit\xE9 Meta/Google",
      description: "Cadrage, tracking light et optimisation continue des campagnes."
    },
    {
      title: "Automatisation & CRM Lite",
      description: "Moins de saisie, plus de suivi utile gr\xE2ce \xE0 des flux simples."
    },
    {
      title: "Contenu & branding",
      description: "Copywriting orient\xE9 conversion et identit\xE9 coh\xE9rente."
    }
  ];
  const faqItems = [
    {
      question: "Travaillez-vous uniquement en Suisse ?",
      answer: "Nous sommes bas\xE9s en Suisse et priorisons les entreprises locales, mais nous pouvons accompagner des projets francophones selon le besoin."
    },
    {
      question: "Peut-on garder notre site actuel ?",
      answer: "Oui, nous pouvons optimiser l'existant si la base est saine. Sinon, nous proposons une refonte progressive."
    },
    {
      question: "Quel est le d\xE9lai moyen ?",
      answer: "Cela d\xE9pend du p\xE9rim\xE8tre. Un site vitrine clair peut sortir rapidement apr\xE8s validation des contenus."
    }
  ];
  const testimonials = [
    {
      name: "Sophie Martin",
      company: "Bistro du Lac",
      role: "G\xE9rante",
      content: "Clic COM a transform\xE9 notre pr\xE9sence en ligne. Nous recevons d\xE9sormais des demandes de r\xE9servation qualifi\xE9es chaque semaine. Le site est rapide et notre message est enfin clair.",
      rating: 5
    },
    {
      name: "Marc Dubois",
      company: "Nexora Swiss",
      role: "Directeur Commercial",
      content: "Une approche directe et efficace. Notre landing page convertit maintenant 3 fois mieux qu'avant. L'\xE9quipe a su clarifier notre proposition de valeur sans fioritures.",
      rating: 5
    },
    {
      name: "Caroline Renaud",
      company: "Atelier Marion",
      role: "Artisane",
      content: "Gr\xE2ce \xE0 l'optimisation SEO local, je suis maintenant visible sur Google Maps et j'ai tripl\xE9 mes demandes. Un investissement qui se rentabilise rapidement.",
      rating: 5
    }
  ];
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "Clic COM \u2014 Le marketing qui fait vendre", "description": "Agence marketing & web en Suisse. Sites rapides, SEO local et campagnes performantes.", "data-astro-cid-j7pv25f6": true }, { "default": async ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "/", "data-astro-cid-j7pv25f6": true })} ${maybeRenderHead()}<main data-astro-cid-j7pv25f6> <!-- Hero Section --> ${renderComponent($$result2, "TechBackground", $$TechBackground, { "variant": "radial", "data-astro-cid-j7pv25f6": true }, { "default": async ($$result3) => renderTemplate` <section class="section-spacing tech-border-b" data-astro-cid-j7pv25f6> <div class="container-tech" data-astro-cid-j7pv25f6> <div class="grid gap-12 lg:grid-cols-[1.2fr,0.8fr] lg:gap-16" data-astro-cid-j7pv25f6> <!-- Hero Content --> <div class="space-y-8" data-astro-cid-j7pv25f6> <div class="inline-flex items-center gap-2 rounded-full border border-[var(--accent-border)] bg-[var(--accent-soft)] px-4 py-2" data-astro-cid-j7pv25f6> <div class="h-1.5 w-1.5 rounded-full bg-[var(--accent-primary)] animate-pulse" data-astro-cid-j7pv25f6></div> <span class="text-sm font-semibold uppercase tracking-wide text-[var(--accent-primary)]" data-astro-cid-j7pv25f6>Agence marketing & web</span> </div> <h1 class="text-balance" data-astro-cid-j7pv25f6>
Le marketing qui fait vendre (pas juste briller).
</h1> <p class="text-lg text-[var(--text-secondary)] max-w-2xl" data-astro-cid-j7pv25f6>
Acquisition clients, sites performants et automatisations simples pour
                convertir plus vite, sans complexité inutile.
</p> <div class="flex flex-wrap gap-4" data-astro-cid-j7pv25f6> ${renderComponent($$result3, "CTAButton", $$CTAButton, { "href": "/contact/", "label": "Demander un devis", "data-astro-cid-j7pv25f6": true }, { "default": async ($$result4) => renderTemplate`
Demander un devis
` })} ${renderComponent($$result3, "CTAButton", $$CTAButton, { "href": "/realisations/", "variant": "secondary", "label": "Voir les r\xE9alisations", "data-astro-cid-j7pv25f6": true }, { "default": async ($$result4) => renderTemplate`
Voir les réalisations
` })} </div> <div class="inline-flex items-center gap-3 rounded-[var(--radius-lg)] tech-border bg-[var(--bg-elevated)] p-4 shadow-[var(--shadow-sm)]" data-astro-cid-j7pv25f6> <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-astro-cid-j7pv25f6> <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" data-astro-cid-j7pv25f6></path> </svg> <div class="text-sm" data-astro-cid-j7pv25f6> <span class="font-semibold text-[var(--text-primary)]" data-astro-cid-j7pv25f6>Coordonnées rapides :</span> <span class="text-[var(--text-secondary)]" data-astro-cid-j7pv25f6> ${site.email} · ${site.phone}</span> </div> </div> </div> <!-- Hero Card --> ${renderComponent($$result3, "TechCard", $$TechCard, { "variant": "elevated", "padding": "lg", "class": "tech-gradient-bg", "data-astro-cid-j7pv25f6": true }, { "default": async ($$result4) => renderTemplate` <h2 class="text-lg font-semibold text-[var(--text-primary)] mb-4" data-astro-cid-j7pv25f6>Ce que vous obtenez</h2> <ul class="space-y-3" data-astro-cid-j7pv25f6> <li class="flex items-start gap-3" data-astro-cid-j7pv25f6> <svg class="mt-0.5 flex-shrink-0" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-primary)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" data-astro-cid-j7pv25f6> <path d="M20 6L9 17l-5-5" data-astro-cid-j7pv25f6></path> </svg> <span class="text-sm text-[var(--text-secondary)]" data-astro-cid-j7pv25f6>Plan d'action clair et priorisé.</span> </li> <li class="flex items-start gap-3" data-astro-cid-j7pv25f6> <svg class="mt-0.5 flex-shrink-0" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-primary)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" data-astro-cid-j7pv25f6> <path d="M20 6L9 17l-5-5" data-astro-cid-j7pv25f6></path> </svg> <span class="text-sm text-[var(--text-secondary)]" data-astro-cid-j7pv25f6>Pages rapides, SEO technique propre.</span> </li> <li class="flex items-start gap-3" data-astro-cid-j7pv25f6> <svg class="mt-0.5 flex-shrink-0" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-primary)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" data-astro-cid-j7pv25f6> <path d="M20 6L9 17l-5-5" data-astro-cid-j7pv25f6></path> </svg> <span class="text-sm text-[var(--text-secondary)]" data-astro-cid-j7pv25f6>Contenus qui parlent à vos clients.</span> </li> <li class="flex items-start gap-3" data-astro-cid-j7pv25f6> <svg class="mt-0.5 flex-shrink-0" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-primary)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" data-astro-cid-j7pv25f6> <path d="M20 6L9 17l-5-5" data-astro-cid-j7pv25f6></path> </svg> <span class="text-sm text-[var(--text-secondary)]" data-astro-cid-j7pv25f6>Suivi simple et automatisations utiles.</span> </li> </ul> <div class="mt-6 rounded-[var(--radius-md)] bg-[var(--bg-elevated)] tech-border p-4" data-astro-cid-j7pv25f6> <p class="text-xs text-[var(--text-tertiary)] font-mono" data-astro-cid-j7pv25f6>
Base technique : Astro + Tailwind, hébergement statique rapide.
</p> </div> ` })} </div> </div> </section> ` })} <!-- Services Section --> <section class="section-spacing" data-astro-cid-j7pv25f6> <div class="container-tech" data-astro-cid-j7pv25f6> <div class="mb-12 space-y-4" data-astro-cid-j7pv25f6> <h2 data-astro-cid-j7pv25f6>Services orientés résultats</h2> <p class="text-lg text-[var(--text-secondary)] max-w-3xl" data-astro-cid-j7pv25f6>
Chaque mission vise la conversion, la clarté et la performance mesurable.
</p> </div> <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3" data-astro-cid-j7pv25f6> ${services.map((service) => renderTemplate`${renderComponent($$result2, "TechCard", $$TechCard, { "hover": true, "data-astro-cid-j7pv25f6": true }, { "default": async ($$result3) => renderTemplate` <h3 class="text-lg font-semibold text-[var(--text-primary)]" data-astro-cid-j7pv25f6>${service.title}</h3> <p class="mt-3 text-sm text-[var(--text-secondary)]" data-astro-cid-j7pv25f6>${service.description}</p> ` })}`)} </div> <div class="mt-10" data-astro-cid-j7pv25f6> ${renderComponent($$result2, "CTAButton", $$CTAButton, { "href": "/services/", "label": "Voir tous les services", "data-astro-cid-j7pv25f6": true }, { "default": async ($$result3) => renderTemplate`
Voir tous les services
` })} </div> </div> </section> <!-- Method Section --> ${renderComponent($$result2, "TechBackground", $$TechBackground, { "variant": "grid", "data-astro-cid-j7pv25f6": true }, { "default": async ($$result3) => renderTemplate` <section class="section-spacing bg-[var(--bg-secondary)]" data-astro-cid-j7pv25f6> <div class="container-tech" data-astro-cid-j7pv25f6> <div class="grid gap-12 lg:grid-cols-2 lg:gap-16" data-astro-cid-j7pv25f6> <div data-astro-cid-j7pv25f6> <h2 data-astro-cid-j7pv25f6>Méthode claire et sans perte de temps</h2> <p class="mt-4 text-[var(--text-secondary)]" data-astro-cid-j7pv25f6>
Nous cadrons vos priorités, structurons votre message, puis optimisons la
                diffusion. Chaque étape reste simple, actionnable et alignée sur vos objectifs.
</p> <ol class="mt-8 space-y-4" data-astro-cid-j7pv25f6> ${[
    "Audit rapide & cadrage des objectifs.",
    "Proposition claire, plan de production et validation.",
    "Ex\xE9cution rapide avec suivi hebdo.",
    "Ajustements et optimisation continue."
  ].map((step, index) => renderTemplate`<li class="flex items-start gap-4" data-astro-cid-j7pv25f6> <span class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-[var(--radius-md)] bg-[var(--accent-primary)] text-sm font-bold text-white" data-astro-cid-j7pv25f6> ${index + 1} </span> <span class="pt-1 text-sm text-[var(--text-secondary)]" data-astro-cid-j7pv25f6>${step}</span> </li>`)} </ol> </div> ${renderComponent($$result3, "TechCard", $$TechCard, { "variant": "elevated", "data-astro-cid-j7pv25f6": true }, { "default": async ($$result4) => renderTemplate` <h3 class="text-lg font-semibold text-[var(--text-primary)]" data-astro-cid-j7pv25f6>Preuves & résultats</h3> <p class="mt-3 text-sm text-[var(--text-secondary)]" data-astro-cid-j7pv25f6>
Pas de chiffres inventés. Nous mesurons ce qui compte :
</p> <ul class="mt-6 space-y-3" data-astro-cid-j7pv25f6> <li class="flex items-start gap-3" data-astro-cid-j7pv25f6> <svg class="mt-0.5 flex-shrink-0" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-primary)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" data-astro-cid-j7pv25f6> <path d="M20 6L9 17l-5-5" data-astro-cid-j7pv25f6></path> </svg> <span class="text-sm text-[var(--text-secondary)]" data-astro-cid-j7pv25f6>Plus de demandes qualifiées.</span> </li> <li class="flex items-start gap-3" data-astro-cid-j7pv25f6> <svg class="mt-0.5 flex-shrink-0" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-primary)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" data-astro-cid-j7pv25f6> <path d="M20 6L9 17l-5-5" data-astro-cid-j7pv25f6></path> </svg> <span class="text-sm text-[var(--text-secondary)]" data-astro-cid-j7pv25f6>Un message qui déclenche l'action.</span> </li> <li class="flex items-start gap-3" data-astro-cid-j7pv25f6> <svg class="mt-0.5 flex-shrink-0" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-primary)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" data-astro-cid-j7pv25f6> <path d="M20 6L9 17l-5-5" data-astro-cid-j7pv25f6></path> </svg> <span class="text-sm text-[var(--text-secondary)]" data-astro-cid-j7pv25f6>Des pages plus rapides et mieux référencées.</span> </li> </ul> ` })} </div> </div> </section> ` })} <!-- Realizations Section --> <section class="section-spacing" data-astro-cid-j7pv25f6> <div class="container-tech" data-astro-cid-j7pv25f6> <div class="mb-10 flex flex-wrap items-end justify-between gap-6" data-astro-cid-j7pv25f6> <h2 data-astro-cid-j7pv25f6>Réalisations</h2> ${renderComponent($$result2, "CTAButton", $$CTAButton, { "href": "/realisations/", "variant": "secondary", "label": "Voir le portfolio", "data-astro-cid-j7pv25f6": true }, { "default": async ($$result3) => renderTemplate`
Voir le portfolio
` })} </div> <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3" data-astro-cid-j7pv25f6> ${realisations.slice(0, 3).map((project) => renderTemplate`${renderComponent($$result2, "TechCard", $$TechCard, { "hover": true, "data-astro-cid-j7pv25f6": true }, { "default": async ($$result3) => renderTemplate` <span class="inline-block rounded-full bg-[var(--accent-soft)] px-3 py-1 text-xs font-semibold uppercase tracking-wide text-[var(--accent-primary)]" data-astro-cid-j7pv25f6> ${project.label} </span> <h3 class="mt-4 text-lg font-semibold text-[var(--text-primary)]" data-astro-cid-j7pv25f6>${project.title}</h3> <p class="mt-3 text-sm text-[var(--text-secondary)]" data-astro-cid-j7pv25f6>${project.goal}</p> <a class="group mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[var(--accent-primary)] transition-all hover:gap-3"${addAttribute(`/realisations/${project.slug}/`, "href")} data-astro-cid-j7pv25f6> <span data-astro-cid-j7pv25f6>Voir le projet</span> <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-astro-cid-j7pv25f6> <path d="M5 12h14M12 5l7 7-7 7" data-astro-cid-j7pv25f6></path> </svg> </a> ` })}`)} </div> </div> </section> <!-- Testimonials Section --> <section class="section-spacing bg-[var(--bg-secondary)]" data-astro-cid-j7pv25f6> <div class="container-tech" data-astro-cid-j7pv25f6> <div class="mb-12 space-y-4" data-astro-cid-j7pv25f6> <h2 data-astro-cid-j7pv25f6>L'avis de nos clients</h2> <p class="text-lg text-[var(--text-secondary)] max-w-3xl" data-astro-cid-j7pv25f6>
Des résultats concrets et mesurables pour nos clients en Suisse.
</p> </div> <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3" data-astro-cid-j7pv25f6> ${testimonials.map((testimonial) => renderTemplate`${renderComponent($$result2, "TechCard", $$TechCard, { "variant": "elevated", "data-astro-cid-j7pv25f6": true }, { "default": async ($$result3) => renderTemplate` <div class="flex gap-1 text-[var(--accent-primary)]" data-astro-cid-j7pv25f6> ${Array.from({ length: testimonial.rating }).map(() => renderTemplate`<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" data-astro-cid-j7pv25f6> <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" data-astro-cid-j7pv25f6></path> </svg>`)} </div> <p class="mt-4 text-sm text-[var(--text-secondary)] italic" data-astro-cid-j7pv25f6>"${testimonial.content}"</p> <div class="mt-6 border-t border-[var(--border-color)] pt-4" data-astro-cid-j7pv25f6> <p class="font-semibold text-[var(--text-primary)]" data-astro-cid-j7pv25f6>${testimonial.name}</p> <p class="text-xs text-[var(--text-tertiary)]" data-astro-cid-j7pv25f6>${testimonial.role} · ${testimonial.company}</p> </div> ` })}`)} </div> </div> </section> <!-- Blog Section --> <section class="section-spacing" data-astro-cid-j7pv25f6> <div class="container-tech" data-astro-cid-j7pv25f6> <div class="mb-10 flex flex-wrap items-end justify-between gap-6" data-astro-cid-j7pv25f6> <div data-astro-cid-j7pv25f6> <h2 data-astro-cid-j7pv25f6>Blog & Conseils</h2> <p class="mt-2 text-[var(--text-secondary)]" data-astro-cid-j7pv25f6>
Astuces et conseils pratiques pour améliorer votre présence en ligne.
</p> </div> ${renderComponent($$result2, "CTAButton", $$CTAButton, { "href": "/blog/", "variant": "secondary", "label": "Tous les articles", "data-astro-cid-j7pv25f6": true }, { "default": async ($$result3) => renderTemplate`
Tous les articles
` })} </div> <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3" data-astro-cid-j7pv25f6> ${latestPosts.map((post) => renderTemplate`${renderComponent($$result2, "TechCard", $$TechCard, { "hover": true, "data-astro-cid-j7pv25f6": true }, { "default": async ($$result3) => renderTemplate` <span class="inline-block rounded-full bg-[var(--accent-soft)] px-3 py-1 text-xs font-semibold uppercase tracking-wide text-[var(--accent-primary)]" data-astro-cid-j7pv25f6> ${post.data.pubDate} </span> <h3 class="mt-4 text-lg font-semibold text-[var(--text-primary)]" data-astro-cid-j7pv25f6>${post.data.title}</h3> <p class="mt-3 text-sm text-[var(--text-secondary)]" data-astro-cid-j7pv25f6>${post.data.description}</p> <a class="group mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[var(--accent-primary)] transition-all hover:gap-3"${addAttribute(`/blog/${post.slug}/`, "href")} data-astro-cid-j7pv25f6> <span data-astro-cid-j7pv25f6>Lire l'article</span> <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-astro-cid-j7pv25f6> <path d="M5 12h14M12 5l7 7-7 7" data-astro-cid-j7pv25f6></path> </svg> </a> ` })}`)} </div> </div> </section> <!-- FAQ & Contact Section --> <section class="section-spacing bg-[var(--bg-secondary)]" data-astro-cid-j7pv25f6> <div class="container-tech" data-astro-cid-j7pv25f6> <div class="grid gap-12 lg:grid-cols-[1.1fr,0.9fr] lg:gap-16" data-astro-cid-j7pv25f6> <div data-astro-cid-j7pv25f6> <h2 data-astro-cid-j7pv25f6>Questions fréquentes</h2> <p class="mt-3 text-[var(--text-secondary)]" data-astro-cid-j7pv25f6>
Vous gardez la maîtrise, nous apportons la structure et la performance.
</p> <div class="mt-8" data-astro-cid-j7pv25f6> ${renderComponent($$result2, "FaqAccordion", $$FaqAccordion, { "items": faqItems, "data-astro-cid-j7pv25f6": true })} </div> </div> ${renderComponent($$result2, "TechCard", $$TechCard, { "variant": "elevated", "data-astro-cid-j7pv25f6": true }, { "default": async ($$result3) => renderTemplate` <h3 class="text-lg font-semibold text-[var(--text-primary)]" data-astro-cid-j7pv25f6>Contact rapide</h3> <p class="mt-3 text-sm text-[var(--text-secondary)]" data-astro-cid-j7pv25f6>
Un projet en tête ? Décrivez votre besoin, nous répondons rapidement avec un
              plan clair.
</p> <form class="mt-6 space-y-4"${addAttribute(`mailto:${site.email}`, "action")} method="POST" data-astro-cid-j7pv25f6> <div class="space-y-2" data-astro-cid-j7pv25f6> <label class="text-xs font-semibold text-[var(--text-primary)]" for="quick-name" data-astro-cid-j7pv25f6>Nom *</label> <input id="quick-name" type="text" name="nom" class="tech-input" required data-astro-cid-j7pv25f6> </div> <div class="space-y-2" data-astro-cid-j7pv25f6> <label class="text-xs font-semibold text-[var(--text-primary)]" for="quick-email" data-astro-cid-j7pv25f6>Email *</label> <input id="quick-email" type="email" name="email" class="tech-input" required data-astro-cid-j7pv25f6> </div> <div class="space-y-2" data-astro-cid-j7pv25f6> <label class="text-xs font-semibold text-[var(--text-primary)]" for="quick-message" data-astro-cid-j7pv25f6>Message *</label> <textarea id="quick-message" name="message" rows="3" class="tech-input" required data-astro-cid-j7pv25f6></textarea> </div> <button type="submit" class="tech-button-primary w-full justify-center" data-astro-cid-j7pv25f6>
Envoyer
</button> </form> <div class="mt-4 flex flex-col gap-2 border-t border-[var(--border-color)] pt-4" data-astro-cid-j7pv25f6> <a class="text-xs text-[var(--accent-primary)] hover:underline"${addAttribute(`mailto:${site.email}`, "href")} data-astro-cid-j7pv25f6> ${site.email} </a> <a class="text-xs text-[var(--accent-primary)] hover:underline"${addAttribute(`tel:${site.phone.replace(/\s+/g, "")}`, "href")} data-astro-cid-j7pv25f6> ${site.phone} </a> </div> ` })} </div> </div> </section> </main> ${renderComponent($$result2, "Footer", $$Footer, { "data-astro-cid-j7pv25f6": true })} ` })} `;
}, "C:/Git/Clicom-site-2026/src/pages/index.astro", void 0);

const $$file = "C:/Git/Clicom-site-2026/src/pages/index.astro";
const $$url = "";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Index,
  file: $$file,
  url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
