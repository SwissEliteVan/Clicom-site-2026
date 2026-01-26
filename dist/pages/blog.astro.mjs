/* empty css                                   */
import { c as createComponent, r as renderComponent, a as renderTemplate, m as maybeRenderHead, d as addAttribute } from '../chunks/astro/server_BbL4JxFn.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../chunks/Footer_h6LQB7Eu.mjs';
import { g as getCollection } from '../chunks/_astro_content_CMUDcPNX.mjs';
export { renderers } from '../renderers.mjs';

const $$Index = createComponent(async ($$result, $$props, $$slots) => {
  const posts = await getCollection("blog");
  const sorted = posts.sort(
    (a, b) => new Date(b.data.pubDate).getTime() - new Date(a.data.pubDate).getTime()
  );
  const categories = [
    { id: "all", name: "Tous les articles", icon: "\u{1F4DA}", color: "bg-accent" },
    { id: "visibilite", name: "Am\xE9liorer sa visibilit\xE9 en ligne", icon: "\u{1F50D}", color: "bg-blue-500" },
    { id: "reseaux-sociaux", name: "Conseils pour vos r\xE9seaux sociaux", icon: "\u{1F4F1}", color: "bg-purple-500" },
    { id: "tendances-web", name: "Tendances du web", icon: "\u{1F680}", color: "bg-green-500" },
    { id: "guides-pratiques", name: "Guides pratiques", icon: "\u{1F4D6}", color: "bg-orange-500" }
  ];
  const getCategoryInfo = (categoryId) => {
    return categories.find((cat) => cat.id === categoryId) || categories[0];
  };
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "Blog & Conseils | Clic COM", "description": "Conseils SEO, performance et marketing orient\xE9s conversion. Articles pratiques pour am\xE9liorer votre pr\xE9sence en ligne.", "breadcrumbs": [{ name: "Accueil", item: "/" }, { name: "Blog", item: "/blog/" }] }, { "default": async ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "/blog/" })} ${maybeRenderHead()}<main class="mx-auto max-w-6xl px-6 py-16"> <div class="space-y-4"> <h1 class="text-4xl font-semibold text-ink">Blog & Conseils</h1> <p class="text-lg text-black/70">
Articles courts et concrets sur la performance web, le SEO local et la conversion. Des conseils pratiques que vous pouvez appliquer immédiatement.
</p> </div> <!-- Navigation par catégorie --> <nav class="mt-10 flex flex-wrap gap-3" aria-label="Filtrer par catégorie"> ${categories.map((category) => renderTemplate`<button type="button"${addAttribute(category.id, "data-category")}${addAttribute(`category-filter rounded-full border border-black/10 bg-white px-4 py-2 text-sm font-semibold text-ink hover:${category.color} hover:text-white hover:border-transparent transition`, "class")}> ${category.icon} ${category.name} </button>`)} </nav> <!-- Liste des articles --> <div class="mt-10 grid gap-6"> ${sorted.map((post) => {
    const categoryInfo = getCategoryInfo(post.data.category);
    return renderTemplate`<article class="blog-post rounded-3xl border border-black/10 bg-white p-6 shadow-soft hover:shadow-lg transition-shadow"${addAttribute(post.data.category, "data-category")}> <div class="flex flex-wrap items-center gap-3 mb-3"> <span${addAttribute(`inline-flex items-center gap-1 rounded-full ${categoryInfo.color} px-3 py-1 text-xs font-semibold text-white`, "class")}> ${categoryInfo.icon} ${categoryInfo.name} </span> <span class="text-xs text-black/60">${post.data.pubDate}</span> <span class="text-xs text-black/60">Par ${post.data.author}</span> </div> <h2 class="text-2xl font-semibold text-ink">${post.data.title}</h2> <p class="mt-3 text-black/70">${post.data.description}</p> <a class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-accent hover:underline"${addAttribute(`/blog/${post.slug}/`, "href")}>
Lire l'article →
</a> </article>`;
  })} </div> <!-- Message si aucun article --> <div id="no-articles" class="hidden mt-10 rounded-3xl border border-black/10 bg-black/5 p-8 text-center"> <p class="text-black/70">Aucun article dans cette catégorie pour le moment. D'autres articles arrivent bientôt !</p> </div> <!-- CTA Newsletter (optionnel) --> <div class="mt-16 rounded-3xl border border-black/10 bg-gradient-to-br from-accent/5 to-accent/10 p-8"> <div class="text-center"> <h2 class="text-2xl font-semibold text-ink">Restez informé</h2> <p class="mt-3 text-black/70">
Recevez nos meilleurs conseils directement dans votre boîte mail.
</p> <form class="mt-6 flex flex-col sm:flex-row gap-3 max-w-md mx-auto" action="#" method="POST"> <input type="email" name="email" placeholder="Votre email" class="flex-1 rounded-full border border-black/20 px-4 py-3 text-sm focus:border-accent focus:outline-none" required> <button type="submit" class="rounded-full bg-accent px-6 py-3 text-sm font-semibold text-white hover:bg-accent/90 transition whitespace-nowrap">
S'abonner
</button> </form> <p class="mt-3 text-xs text-black/60">
Newsletter mensuelle. Désabonnement en un clic.
</p> </div> </div> <!-- Section catégories détaillées --> <div class="mt-16"> <h2 class="text-2xl font-semibold text-ink mb-8">Nos catégories</h2> <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4"> ${categories.filter((cat) => cat.id !== "all").map((category) => renderTemplate`<div class="rounded-2xl border border-black/10 bg-white p-6 shadow-soft"> <div class="text-3xl mb-3">${category.icon}</div> <h3 class="font-semibold text-ink">${category.name}</h3> <p class="mt-2 text-xs text-black/60"> ${category.id === "visibilite" && "SEO, r\xE9f\xE9rencement local, optimisation technique"} ${category.id === "reseaux-sociaux" && "Community management, strat\xE9gie social media"} ${category.id === "tendances-web" && "Actualit\xE9s web, nouvelles technologies"} ${category.id === "guides-pratiques" && "Tutoriels pas \xE0 pas, guides d\xE9taill\xE9s"} </p> </div>`)} </div> </div> </main>  ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
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
