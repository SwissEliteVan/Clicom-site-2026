/* empty css                                   */
import { c as createComponent, r as renderComponent, a as renderTemplate, m as maybeRenderHead, d as addAttribute } from '../chunks/astro/server_BbL4JxFn.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../chunks/Footer_h6LQB7Eu.mjs';
import { s as site } from '../chunks/site_CV2KWidJ.mjs';
export { renderers } from '../renderers.mjs';

const $$MentionsLegales = createComponent(($$result, $$props, $$slots) => {
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "Mentions l\xE9gales | Clic COM", "description": "Mentions l\xE9gales de l'agence Clic COM en Suisse.", "breadcrumbs": [
    { name: "Accueil", item: "/" },
    { name: "Mentions l\xE9gales", item: "/mentions-legales/" }
  ] }, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "/mentions-legales/" })} ${maybeRenderHead()}<main class="mx-auto max-w-4xl px-6 py-16"> <h1 class="text-4xl font-semibold text-ink">Mentions légales</h1> <section class="mt-6 space-y-4 text-sm text-black/70"> <p><strong>Éditeur :</strong> ${site.name}</p> <p><strong>Activité :</strong> Agence marketing & web orientée résultats.</p> <p><strong>Email :</strong> <a class="text-accent underline"${addAttribute(`mailto:${site.email}`, "href")}>${site.email}</a></p> <p><strong>Téléphone :</strong> <a class="text-accent underline"${addAttribute(`tel:${site.phone.replace(/\s+/g, "")}`, "href")}>${site.phone}</a></p> <p><strong>Pays :</strong> Suisse</p> <p>
Aucun numéro d'IDE/TVA ou adresse postale n'est publié à ce stade.
</p> </section> </main> ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
}, "C:/Git/Clicom-site-2026/src/pages/mentions-legales.astro", void 0);

const $$file = "C:/Git/Clicom-site-2026/src/pages/mentions-legales.astro";
const $$url = "/mentions-legales";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$MentionsLegales,
  file: $$file,
  url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
