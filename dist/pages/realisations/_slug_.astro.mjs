/* empty css                                      */
import { d as createAstro, c as createComponent, r as renderComponent, a as renderTemplate, m as maybeRenderHead } from '../../chunks/astro/server_PoaPgSBg.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../../chunks/Footer_BEGMSiPb.mjs';
import { r as realisations } from '../../chunks/realisations_o6tNqV5G.mjs';
import { s as site } from '../../chunks/site_Csd5TUrh.mjs';
export { renderers } from '../../renderers.mjs';

const $$Astro = createAstro("https://clicom.ch");
async function getStaticPaths() {
  return realisations.map((project) => ({
    params: { slug: project.slug },
    props: { project }
  }));
}
const $$slug = createComponent(($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro, $$props, $$slots);
  Astro2.self = $$slug;
  const { project } = Astro2.props;
  const jsonLd = [
    {
      "@context": "https://schema.org",
      "@type": "CreativeWork",
      name: project.title,
      description: project.goal,
      url: `${site.url}/realisations/${project.slug}/`
    }
  ];
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": `${project.title} | R\xE9alisations Clic COM`, "description": project.goal, "canonical": `${site.url}/realisations/${project.slug}/`, "breadcrumbs": [
    { name: "Accueil", item: "/" },
    { name: "R\xE9alisations", item: "/realisations/" },
    { name: project.title, item: `/realisations/${project.slug}/` }
  ], "jsonLd": jsonLd }, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "/realisations/" })} ${maybeRenderHead()}<main class="mx-auto max-w-5xl px-6 py-16"> <p class="text-xs font-semibold uppercase text-accent">Projet exemple</p> <h1 class="mt-2 text-4xl font-semibold text-ink">${project.title}</h1> <p class="mt-4 text-lg text-black/70">${project.goal}</p> <div class="mt-10 grid gap-6 lg:grid-cols-3"> <section class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft"> <h2 class="text-lg font-semibold text-ink">Objectif</h2> <p class="mt-3 text-sm text-black/70">${project.goal}</p> </section> <section class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft"> <h2 class="text-lg font-semibold text-ink">Solution</h2> <p class="mt-3 text-sm text-black/70">${project.solution}</p> </section> <section class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft"> <h2 class="text-lg font-semibold text-ink">Stack</h2> <ul class="mt-3 space-y-1 text-sm text-black/70"> ${project.stack.map((item) => renderTemplate`<li>• ${item}</li>`)} </ul> </section> </div> <section class="mt-10 rounded-3xl border border-black/10 bg-black/5 p-6"> <h2 class="text-lg font-semibold text-ink">Résultats qualitatifs</h2> <ul class="mt-4 space-y-2 text-sm text-black/70"> ${project.results.map((result) => renderTemplate`<li>• ${result}</li>`)} </ul> </section> <a class="mt-10 inline-flex text-sm font-semibold text-accent" href="/contact/">
Discuter d'un projet similaire →
</a> </main> ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
}, "C:/Git/Nat 2026/Clicom-site-2026/src/pages/realisations/[slug].astro", void 0);

const $$file = "C:/Git/Nat 2026/Clicom-site-2026/src/pages/realisations/[slug].astro";
const $$url = "/realisations/[slug]";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$slug,
  file: $$file,
  getStaticPaths,
  url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
