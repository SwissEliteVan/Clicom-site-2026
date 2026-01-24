/* empty css                                   */
import { b as createAstro, c as createComponent, m as maybeRenderHead, a as renderTemplate, r as renderComponent, d as addAttribute } from '../chunks/astro/server_BbL4JxFn.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../chunks/Footer_Cu2PibUr.mjs';
import { $ as $$CTAButton } from '../chunks/CTAButton_DKlGdm8N.mjs';
import 'clsx';
import { r as realisations } from '../chunks/realisations_o6tNqV5G.mjs';
import { s as site } from '../chunks/site_Csd5TUrh.mjs';
import { g as getCollection } from '../chunks/_astro_content_CMUDcPNX.mjs';
export { renderers } from '../renderers.mjs';

const $$Astro$1 = createAstro("https://clicom.ch");
const $$FaqAccordion = createComponent(($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$1, $$props, $$slots);
  Astro2.self = $$FaqAccordion;
  const { items } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<div class="space-y-4"> ${items.map((item) => renderTemplate`<details class="rounded-2xl border border-black/10 px-5 py-4"> <summary class="cursor-pointer text-sm font-semibold text-ink"> ${item.question} </summary> <p class="mt-3 text-sm text-black/70">${item.answer}</p> </details>`)} </div>`;
}, "C:/Git/Clicom-site-2026/src/components/FaqAccordion.astro", void 0);

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
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "Clic COM \u2014 Le marketing qui fait vendre", "description": "Agence marketing & web en Suisse. Sites rapides, SEO local et campagnes performantes." }, { "default": async ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "/" })} ${maybeRenderHead()}<main> <section class="border-b border-black/10 bg-white"> <div class="mx-auto grid max-w-6xl gap-10 px-6 py-16 lg:grid-cols-[1.2fr,0.8fr]"> <div class="space-y-6"> <p class="text-sm font-semibold uppercase text-accent">Agence marketing & web</p> <h1 class="text-4xl font-semibold leading-tight text-ink lg:text-5xl">
Le marketing qui fait vendre (pas juste briller).
</h1> <p class="text-lg text-black/70">
Acquisition clients, sites performants et automatisations simples pour
            convertir plus vite, sans complexité inutile.
</p> <div class="flex flex-wrap gap-3"> ${renderComponent($$result2, "CTAButton", $$CTAButton, { "href": "/contact/", "label": "Demander un devis" }, { "default": async ($$result3) => renderTemplate`Demander un devis` })} ${renderComponent($$result2, "CTAButton", $$CTAButton, { "href": "/realisations/", "variant": "secondary", "label": "Voir les r\xE9alisations" }, { "default": async ($$result3) => renderTemplate`
Voir les réalisations
` })} </div> <div class="rounded-2xl border border-black/10 bg-white p-4 text-sm text-black/70"> <strong class="text-ink">Coordonnées rapides :</strong> ${site.email} · ${site.phone} </div> </div> <div class="rounded-3xl border border-black/10 bg-gradient-to-br from-white to-black/5 p-8 shadow-soft"> <p class="text-sm font-semibold text-ink">Ce que vous obtenez</p> <ul class="mt-4 space-y-3 text-sm text-black/70"> <li>• Plan d'action clair et priorisé.</li> <li>• Pages rapides, SEO technique propre.</li> <li>• Contenus qui parlent à vos clients.</li> <li>• Suivi simple et automatisations utiles.</li> </ul> <div class="mt-6 rounded-2xl bg-white p-4 text-xs text-black/60">
Base technique : Astro + Tailwind, hébergement statique rapide.
</div> </div> </div> </section> <section class="mx-auto max-w-6xl px-6 py-16"> <div class="flex flex-col gap-6"> <h2 class="text-3xl font-semibold text-ink">Services orientés résultats</h2> <p class="text-black/70">
Chaque mission vise la conversion, la clarté et la performance mesurable.
</p> </div> <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3"> ${services.map((service) => renderTemplate`<article class="rounded-2xl border border-black/10 bg-white p-6 shadow-soft"> <h3 class="text-lg font-semibold text-ink">${service.title}</h3> <p class="mt-3 text-sm text-black/70">${service.description}</p> </article>`)} </div> <div class="mt-8"> ${renderComponent($$result2, "CTAButton", $$CTAButton, { "href": "/services/", "label": "Voir tous les services" }, { "default": async ($$result3) => renderTemplate`
Voir tous les services
` })} </div> </section> <section class="border-t border-black/10 bg-black/5"> <div class="mx-auto grid max-w-6xl gap-10 px-6 py-16 lg:grid-cols-2"> <div> <h2 class="text-3xl font-semibold text-ink">Méthode claire et sans perte de temps</h2> <p class="mt-4 text-black/70">
Nous cadrons vos priorités, structurons votre message, puis optimisons la
            diffusion. Chaque étape reste simple, actionnable et alignée sur vos objectifs.
</p> <ol class="mt-6 space-y-3 text-sm text-black/70"> <li>1. Audit rapide & cadrage des objectifs.</li> <li>2. Proposition claire, plan de production et validation.</li> <li>3. Exécution rapide avec suivi hebdo.</li> <li>4. Ajustements et optimisation continue.</li> </ol> </div> <div class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft"> <h3 class="text-lg font-semibold text-ink">Preuves & résultats</h3> <p class="mt-3 text-sm text-black/70">
Pas de chiffres inventés. Nous mesurons ce qui compte :
</p> <ul class="mt-4 space-y-3 text-sm text-black/70"> <li>• Plus de demandes qualifiées.</li> <li>• Un message qui déclenche l'action.</li> <li>• Des pages plus rapides et mieux référencées.</li> </ul> </div> </div> </section> <section class="mx-auto max-w-6xl px-6 py-16"> <div class="flex items-center justify-between gap-4"> <h2 class="text-3xl font-semibold text-ink">Réalisations</h2> ${renderComponent($$result2, "CTAButton", $$CTAButton, { "href": "/realisations/", "variant": "secondary", "label": "Voir le portfolio" }, { "default": async ($$result3) => renderTemplate`
Voir le portfolio
` })} </div> <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3"> ${realisations.slice(0, 3).map((project) => renderTemplate`<article class="rounded-2xl border border-black/10 bg-white p-6 shadow-soft"> <p class="text-xs font-semibold uppercase text-accent">${project.label}</p> <h3 class="mt-2 text-lg font-semibold text-ink">${project.title}</h3> <p class="mt-3 text-sm text-black/70">${project.goal}</p> <a class="mt-4 inline-flex text-sm font-semibold text-accent"${addAttribute(`/realisations/${project.slug}/`, "href")}>
Voir le projet →
</a> </article>`)} </div> </section> <section class="border-t border-black/10 bg-black/5"> <div class="mx-auto max-w-6xl px-6 py-16"> <div class="flex flex-col gap-6"> <h2 class="text-3xl font-semibold text-ink">L'avis de nos clients</h2> <p class="text-black/70">
Des résultats concrets et mesurables pour nos clients en Suisse.
</p> </div> <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3"> ${testimonials.map((testimonial) => renderTemplate`<article class="rounded-2xl border border-black/10 bg-white p-6 shadow-soft"> <div class="flex gap-1 text-accent"> ${Array.from({ length: testimonial.rating }).map(() => renderTemplate`<span>★</span>`)} </div> <p class="mt-4 text-sm text-black/70 italic">"${testimonial.content}"</p> <div class="mt-6 border-t border-black/10 pt-4"> <p class="font-semibold text-ink">${testimonial.name}</p> <p class="text-xs text-black/60">${testimonial.role} · ${testimonial.company}</p> </div> </article>`)} </div> </div> </section> <section class="mx-auto max-w-6xl px-6 py-16"> <div class="flex items-center justify-between gap-4"> <div> <h2 class="text-3xl font-semibold text-ink">Blog & Conseils</h2> <p class="mt-2 text-black/70">
Astuces et conseils pratiques pour améliorer votre présence en ligne.
</p> </div> ${renderComponent($$result2, "CTAButton", $$CTAButton, { "href": "/blog/", "variant": "secondary", "label": "Tous les articles" }, { "default": async ($$result3) => renderTemplate`
Tous les articles
` })} </div> <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3"> ${latestPosts.map((post) => renderTemplate`<article class="rounded-2xl border border-black/10 bg-white p-6 shadow-soft"> <p class="text-xs font-semibold uppercase text-accent">${post.data.pubDate}</p> <h3 class="mt-2 text-lg font-semibold text-ink">${post.data.title}</h3> <p class="mt-3 text-sm text-black/70">${post.data.description}</p> <a class="mt-4 inline-flex text-sm font-semibold text-accent"${addAttribute(`/blog/${post.slug}/`, "href")}>
Lire l'article →
</a> </article>`)} </div> </section> <section class="border-t border-black/10 bg-white"> <div class="mx-auto grid max-w-6xl gap-10 px-6 py-16 lg:grid-cols-[1.1fr,0.9fr]"> <div> <h2 class="text-3xl font-semibold text-ink">Questions fréquentes</h2> <p class="mt-3 text-black/70">
Vous gardez la maîtrise, nous apportons la structure et la performance.
</p> <div class="mt-6"> ${renderComponent($$result2, "FaqAccordion", $$FaqAccordion, { "items": faqItems })} </div> </div> <div class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft"> <h3 class="text-lg font-semibold text-ink">Contact rapide</h3> <p class="mt-3 text-sm text-black/70">
Un projet en tête ? Décrivez votre besoin, nous répondons rapidement avec un
            plan clair.
</p> <form class="mt-6 space-y-4"${addAttribute(`mailto:${site.email}`, "action")} method="POST"> <div class="space-y-2"> <label class="text-xs font-semibold" for="quick-name">Nom *</label> <input id="quick-name" type="text" name="nom" class="w-full rounded-xl border border-black/20 px-4 py-2 text-sm focus:border-accent focus:outline-none" required> </div> <div class="space-y-2"> <label class="text-xs font-semibold" for="quick-email">Email *</label> <input id="quick-email" type="email" name="email" class="w-full rounded-xl border border-black/20 px-4 py-2 text-sm focus:border-accent focus:outline-none" required> </div> <div class="space-y-2"> <label class="text-xs font-semibold" for="quick-message">Message *</label> <textarea id="quick-message" name="message" rows="3" class="w-full rounded-xl border border-black/20 px-4 py-2 text-sm focus:border-accent focus:outline-none" required></textarea> </div> <button type="submit" class="w-full rounded-full bg-accent px-6 py-3 text-sm font-semibold text-white hover:bg-accent/90 transition">
Envoyer
</button> </form> <div class="mt-4 flex flex-col gap-2 border-t border-black/10 pt-4"> <a class="text-xs text-accent underline"${addAttribute(`mailto:${site.email}`, "href")}> ${site.email} </a> <a class="text-xs text-accent underline"${addAttribute(`tel:${site.phone.replace(/\s+/g, "")}`, "href")}> ${site.phone} </a> </div> </div> </div> </section> </main> ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
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
