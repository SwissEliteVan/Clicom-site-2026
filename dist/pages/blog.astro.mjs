/* empty css                                   */
import { c as createComponent, r as renderComponent, a as renderTemplate, m as maybeRenderHead, b as addAttribute } from '../chunks/astro/server_PoaPgSBg.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../chunks/Footer_WL_g8g0y.mjs';
import { g as getCollection } from '../chunks/_astro_content_CBLHvkGu.mjs';
export { renderers } from '../renderers.mjs';

const $$Index = createComponent(async ($$result, $$props, $$slots) => {
  const posts = await getCollection("blog");
  const sorted = posts.sort(
    (a, b) => new Date(b.data.pubDate).getTime() - new Date(a.data.pubDate).getTime()
  );
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "Blog | Clic COM", "description": "Conseils SEO, performance et marketing orient\xE9s conversion.", "breadcrumbs": [{ name: "Accueil", item: "/" }, { name: "Blog", item: "/blog/" }] }, { "default": async ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "/blog/" })} ${maybeRenderHead()}<main class="mx-auto max-w-5xl px-6 py-16"> <h1 class="text-4xl font-semibold text-ink">Blog</h1> <p class="mt-4 text-lg text-black/70">
Articles courts et concrets sur la performance web, le SEO local et la conversion.
</p> <div class="mt-10 grid gap-6"> ${sorted.map((post) => renderTemplate`<article class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft"> <p class="text-xs font-semibold uppercase text-accent">${post.data.pubDate}</p> <h2 class="mt-2 text-xl font-semibold text-ink">${post.data.title}</h2> <p class="mt-3 text-sm text-black/70">${post.data.description}</p> <a class="mt-4 inline-flex text-sm font-semibold text-accent"${addAttribute(`/blog/${post.slug}/`, "href")}>
Lire l'article →
</a> </article>`)} </div> </main> ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
}, "C:/Git/Clicom-site-2026/src/pages/blog/index.astro", void 0);

const $$file = "C:/Git/Clicom-site-2026/src/pages/blog/index.astro";
const $$url = "/blog";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Index,
  file: $$file,
  url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
