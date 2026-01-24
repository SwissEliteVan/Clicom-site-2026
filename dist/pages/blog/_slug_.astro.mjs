/* empty css                                      */
import { b as createAstro, c as createComponent, r as renderComponent, a as renderTemplate, m as maybeRenderHead } from '../../chunks/astro/server_BbL4JxFn.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../../chunks/Footer_D8jxgJpx.mjs';
import { g as getCollection } from '../../chunks/_astro_content_BAYglURB.mjs';
import { s as site } from '../../chunks/site_CV2KWidJ.mjs';
export { renderers } from '../../renderers.mjs';

const $$Astro = createAstro("https://clicom.ch");
async function getStaticPaths() {
  const posts = await getCollection("blog");
  return posts.map((post) => ({ params: { slug: post.slug }, props: { post } }));
}
const $$slug = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro, $$props, $$slots);
  Astro2.self = $$slug;
  const { post } = Astro2.props;
  const jsonLd = [
    {
      "@context": "https://schema.org",
      "@type": "Article",
      headline: post.data.title,
      description: post.data.description,
      datePublished: post.data.pubDate,
      author: {
        "@type": "Organization",
        name: site.name
      },
      url: `${site.url}/blog/${post.slug}/`
    }
  ];
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": `${post.data.title} | Blog Clic COM`, "description": post.data.description, "canonical": `${site.url}/blog/${post.slug}/`, "breadcrumbs": [
    { name: "Accueil", item: "/" },
    { name: "Blog", item: "/blog/" },
    { name: post.data.title, item: `/blog/${post.slug}/` }
  ], "jsonLd": jsonLd }, { "default": async ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "/blog/" })} ${maybeRenderHead()}<main class="mx-auto max-w-3xl px-6 py-16"> <p class="text-xs font-semibold uppercase text-accent">${post.data.pubDate}</p> <h1 class="mt-2 text-4xl font-semibold text-ink">${post.data.title}</h1> <p class="mt-4 text-lg text-black/70">${post.data.description}</p> <article class="mt-10 space-y-4 text-sm leading-7 text-black/80"> ${renderComponent($$result2, "post.Content", post.Content, {})} </article> <a class="mt-10 inline-flex text-sm font-semibold text-accent" href="/blog/">
Retour au blog →
</a> </main> ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
}, "C:/Git/Clicom-site-2026/src/pages/blog/[slug].astro", void 0);

const $$file = "C:/Git/Clicom-site-2026/src/pages/blog/[slug].astro";
const $$url = "/blog/[slug]";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$slug,
  file: $$file,
  getStaticPaths,
  url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
