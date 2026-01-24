import { g as getCollection } from '../chunks/_astro_content_BAYglURB.mjs';
import { r as realisations } from '../chunks/realisations_o6tNqV5G.mjs';
import { s as site } from '../chunks/site_CV2KWidJ.mjs';
export { renderers } from '../renderers.mjs';

const GET = async () => {
  const blogPosts = await getCollection("blog");
  const pages = [
    "",
    "/services/",
    "/realisations/",
    "/apropos/",
    "/contact/",
    "/blog/",
    "/mentions-legales/",
    "/politique-confidentialite/",
    "/cookies/",
    "/en/",
    "/de/"
  ];
  const urls = [
    ...pages.map((path) => `${site.url}${path}`),
    ...realisations.map((project) => `${site.url}/realisations/${project.slug}/`),
    ...blogPosts.map((post) => `${site.url}/blog/${post.slug}/`)
  ];
  const body = `<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">${urls.map((url) => `
  <url><loc>${url}</loc></url>`).join("")}
</urlset>`;
  return new Response(body, {
    headers: {
      "Content-Type": "application/xml"
    }
  });
};

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  GET
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
