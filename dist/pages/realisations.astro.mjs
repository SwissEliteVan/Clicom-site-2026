/* empty css                                   */
import { c as createComponent, r as renderComponent, a as renderTemplate, m as maybeRenderHead, b as addAttribute } from '../chunks/astro/server_PoaPgSBg.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../chunks/Footer_BEGMSiPb.mjs';
import { r as realisations } from '../chunks/realisations_o6tNqV5G.mjs';
export { renderers } from '../renderers.mjs';

const $$Realisations = createComponent(($$result, $$props, $$slots) => {
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "R\xE9alisations | Clic COM", "description": "Portfolio Clic COM : projets web et marketing orient\xE9s conversion.", "breadcrumbs": [{ name: "Accueil", item: "/" }, { name: "R\xE9alisations", item: "/realisations/" }] }, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "/realisations/" })} ${maybeRenderHead()}<main class="mx-auto max-w-6xl px-6 py-16"> <div class="space-y-4"> <h1 class="text-4xl font-semibold text-ink">Réalisations</h1> <p class="text-lg text-black/70">
Projets exemples et missions réalisées. Chaque fiche présente l'objectif, la
        solution et le résultat qualitatif.
</p> </div> <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3"> ${realisations.map((project) => renderTemplate`<article class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft"> <p class="text-xs font-semibold uppercase text-accent">${project.label} · exemple</p> <h2 class="mt-2 text-lg font-semibold text-ink">${project.title}</h2> <p class="mt-3 text-sm text-black/70">${project.goal}</p> <a class="mt-4 inline-flex text-sm font-semibold text-accent"${addAttribute(`/realisations/${project.slug}/`, "href")}>
Découvrir →
</a> </article>`)} </div> </main> ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
}, "C:/Git/Nat 2026/Clicom-site-2026/src/pages/realisations.astro", void 0);

const $$file = "C:/Git/Nat 2026/Clicom-site-2026/src/pages/realisations.astro";
const $$url = "/realisations";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Realisations,
  file: $$file,
  url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
