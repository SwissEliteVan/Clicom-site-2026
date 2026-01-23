/* empty css                                   */
import { c as createComponent, r as renderComponent, a as renderTemplate, m as maybeRenderHead, b as addAttribute } from '../chunks/astro/server_PoaPgSBg.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../chunks/Footer_BEGMSiPb.mjs';
import { $ as $$CTAButton } from '../chunks/CTAButton_D0PwtIpl.mjs';
import { s as site } from '../chunks/site_Csd5TUrh.mjs';
export { renderers } from '../renderers.mjs';

const $$Apropos = createComponent(($$result, $$props, $$slots) => {
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "\xC0 propos | Clic COM", "description": "Agence marketing & web en Suisse orient\xE9e r\xE9sultats, performance et conversion.", "breadcrumbs": [{ name: "Accueil", item: "/" }, { name: "\xC0 propos", item: "/apropos/" }] }, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "/apropos/" })} ${maybeRenderHead()}<main class="mx-auto max-w-5xl px-6 py-16"> <h1 class="text-4xl font-semibold text-ink">À propos</h1> <p class="mt-4 text-lg text-black/70">
Clic COM est une agence marketing & web basée en Suisse. Nous aidons les PME et
      indépendants à obtenir plus de clients grâce à des sites rapides, un SEO local propre
      et des messages clairs.
</p> <section class="mt-10 grid gap-6 lg:grid-cols-2"> <div class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft"> <h2 class="text-xl font-semibold text-ink">Notre approche</h2> <p class="mt-3 text-sm text-black/70">
Pas de blabla : un diagnostic rapide, un plan d'action clair et une exécution
          rapide. Nous mesurons ce qui compte et ajustons en continu.
</p> </div> <div class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft"> <h2 class="text-xl font-semibold text-ink">Engagements</h2> <ul class="mt-3 space-y-2 text-sm text-black/70"> <li>• Performance et vitesse en priorité.</li> <li>• Contenu orienté conversion.</li> <li>• Conformité nLPD et accessibilité.</li> <li>• Transparence sur les actions menées.</li> </ul> </div> </section> <section class="mt-10 rounded-3xl border border-black/10 bg-black/5 p-6"> <h2 class="text-xl font-semibold text-ink">Coordonnées</h2> <div class="mt-3 text-sm text-black/70"> <p>Email : <a class="text-accent underline"${addAttribute(`mailto:${site.email}`, "href")}>${site.email}</a></p> <p>Téléphone : <a class="text-accent underline"${addAttribute(`tel:${site.phone.replace(/\s+/g, "")}`, "href")}>${site.phone}</a></p> <p>Site : <a class="text-accent underline"${addAttribute(site.url, "href")}>${site.url}</a></p> <p class="mt-3 text-xs text-black/60">Bloc « signature HTML » à intégrer ici dès réception.</p> </div> </section> <div class="mt-10"> ${renderComponent($$result2, "CTAButton", $$CTAButton, { "href": "/contact/", "label": "Parler du projet" }, { "default": ($$result3) => renderTemplate`
Parler du projet
` })} </div> </main> ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
}, "C:/Git/Nat 2026/Clicom-site-2026/src/pages/apropos.astro", void 0);

const $$file = "C:/Git/Nat 2026/Clicom-site-2026/src/pages/apropos.astro";
const $$url = "/apropos";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Apropos,
  file: $$file,
  url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
