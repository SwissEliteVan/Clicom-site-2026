import type { APIRoute } from "astro";
import { getCollection } from "astro:content";
import { realisations } from "../data/realisations";
import { site } from "../lib/site";

export const GET: APIRoute = async () => {
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
    "/de/",
  ];

  const urls = [
    ...pages.map((path) => `${site.url}${path}`),
    ...realisations.map((project) => `${site.url}/realisations/${project.slug}/`),
    ...blogPosts.map((post) => `${site.url}/blog/${post.slug}/`),
  ];

  const body = `<?xml version="1.0" encoding="UTF-8"?>\n<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">${urls
    .map((url) => `\n  <url><loc>${url}</loc></url>`)
    .join("")}\n</urlset>`;

  return new Response(body, {
    headers: {
      "Content-Type": "application/xml",
    },
  });
};
