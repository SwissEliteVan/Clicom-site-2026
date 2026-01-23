import { d as createAstro, c as createComponent, a as renderTemplate, h as renderSlot, i as renderHead, b as addAttribute, m as maybeRenderHead } from './astro/server_PoaPgSBg.mjs';
import 'kleur/colors';
import 'clsx';
/* empty css                           */
import { s as site, n as navigation, l as locales } from './site_Csd5TUrh.mjs';

var __freeze = Object.freeze;
var __defProp = Object.defineProperty;
var __template = (cooked, raw) => __freeze(__defProp(cooked, "raw", { value: __freeze(cooked.slice()) }));
var _a, _b;
const $$Astro$1 = createAstro("https://clicom.ch");
const $$BaseLayout = createComponent(($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$1, $$props, $$slots);
  Astro2.self = $$BaseLayout;
  const {
    title,
    description,
    canonical = site.url,
    lang = "fr",
    breadcrumbs,
    jsonLd = []
  } = Astro2.props;
  const organizationSchema = {
    "@context": "https://schema.org",
    "@type": "ProfessionalService",
    name: site.name,
    url: site.url,
    description: site.slogan,
    email: site.email,
    telephone: site.phone,
    areaServed: "CH"
  };
  const websiteSchema = {
    "@context": "https://schema.org",
    "@type": "WebSite",
    name: site.name,
    url: site.url,
    potentialAction: {
      "@type": "SearchAction",
      target: `${site.url}/blog/?q={search_term_string}`,
      "query-input": "required name=search_term_string"
    }
  };
  const breadcrumbSchema = breadcrumbs ? {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    itemListElement: breadcrumbs.map((crumb, index) => ({
      "@type": "ListItem",
      position: index + 1,
      name: crumb.name,
      item: `${site.url}${crumb.item}`
    }))
  } : null;
  const schemas = [organizationSchema, websiteSchema, breadcrumbSchema, ...jsonLd].filter(
    Boolean
  );
  return renderTemplate(_b || (_b = __template(["<html", '> <head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>', '</title><meta name="description"', '><link rel="canonical"', '><meta property="og:title"', '><meta property="og:description"', '><meta property="og:type" content="website"><meta property="og:url"', '><meta property="og:site_name"', '><meta name="twitter:card" content="summary_large_image"><meta name="twitter:title"', '><meta name="twitter:description"', '><meta name="theme-color"', ">", "", '</head> <body class="min-h-screen bg-white text-ink"> ', ` <div id="cookie-banner" class="fixed bottom-4 left-4 right-4 z-50 hidden max-w-xl rounded-2xl border border-black/10 bg-white p-4 shadow-soft" role="dialog" aria-live="polite" aria-label="Pr\xE9f\xE9rences cookies"> <div class="flex flex-col gap-3 text-sm"> <p>
Nous n'utilisons aucun tracking par d\xE9faut. Activez l'analytics si vous
          souhaitez aider \xE0 am\xE9liorer le site.
</p> <div class="flex flex-wrap gap-2"> <button class="focus-ring rounded-full bg-ink px-4 py-2 text-white" data-cookie-accept type="button">
Accepter analytics
</button> <button class="focus-ring rounded-full border border-ink px-4 py-2" data-cookie-decline type="button">
Refuser
</button> <a class="focus-ring text-accent underline" href="/cookies/">En savoir plus</a> </div> </div> </div> <script>
      const banner = document.getElementById("cookie-banner");
      const consentKey = "clicom-analytics-consent";
      const stored = localStorage.getItem(consentKey);
      if (!stored && banner) {
        banner.classList.remove("hidden");
      }
      document
        .querySelector("[data-cookie-accept]")
        ?.addEventListener("click", () => {
          localStorage.setItem(consentKey, "accepted");
          banner?.classList.add("hidden");
          // Analytics loading example (keep commented until used)
          // if (window.gtag) return;
        });
      document
        .querySelector("[data-cookie-decline]")
        ?.addEventListener("click", () => {
          localStorage.setItem(consentKey, "declined");
          banner?.classList.add("hidden");
        });
    <\/script> </body> </html>`])), addAttribute(lang, "lang"), title, addAttribute(description, "content"), addAttribute(canonical, "href"), addAttribute(title, "content"), addAttribute(description, "content"), addAttribute(canonical, "content"), addAttribute(site.name, "content"), addAttribute(title, "content"), addAttribute(description, "content"), addAttribute(site.accent, "content"), schemas.length > 0 && renderTemplate(_a || (_a = __template(['<script type="application/ld+json">{JSON.stringify(schemas)}<\/script>']))), renderHead(), renderSlot($$result, $$slots["default"]));
}, "C:/Git/Nat 2026/Clicom-site-2026/src/layouts/BaseLayout.astro", void 0);

const $$Astro = createAstro("https://clicom.ch");
const $$Navbar = createComponent(($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro, $$props, $$slots);
  Astro2.self = $$Navbar;
  const { current } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<header class="sticky top-0 z-40 border-b border-black/10 bg-white/95 backdrop-blur"> <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4"> <a href="/" class="text-lg font-semibold text-ink"> <span class="text-accent">●</span> ${site.name} </a> <nav class="hidden gap-6 text-sm font-medium lg:flex" aria-label="Navigation principale"> ${navigation.map((item) => renderTemplate`<a${addAttribute(item.href, "href")}${addAttribute(`focus-ring transition ${current === item.href ? "text-accent" : "text-ink hover:text-accent"}`, "class")}> ${item.label} </a>`)} </nav> <div class="hidden items-center gap-2 lg:flex"> ${locales.map((locale) => renderTemplate`<a class="focus-ring rounded-full border border-black/10 px-3 py-1 text-xs"${addAttribute(locale.href, "href")}${addAttribute(`Version ${locale.label}`, "aria-label")}> ${locale.label} </a>`)} </div> <a href="/contact/" class="focus-ring rounded-full bg-accent px-4 py-2 text-sm font-semibold text-white lg:hidden" aria-label="Demander un devis">
Devis
</a> </div> <div class="border-t border-black/10 lg:hidden"> <div class="mx-auto flex max-w-6xl flex-wrap gap-4 px-6 py-3 text-sm"> ${navigation.map((item) => renderTemplate`<a${addAttribute(item.href, "href")}${addAttribute(`focus-ring ${current === item.href ? "text-accent" : "text-ink"}`, "class")}> ${item.label} </a>`)} </div> </div> </header>`;
}, "C:/Git/Nat 2026/Clicom-site-2026/src/components/Navbar.astro", void 0);

const $$Footer = createComponent(($$result, $$props, $$slots) => {
  return renderTemplate`${maybeRenderHead()}<footer class="border-t border-black/10 bg-white"> <div class="mx-auto grid max-w-6xl gap-8 px-6 py-12 lg:grid-cols-[2fr,1fr,1fr]"> <div class="space-y-3"> <p class="text-lg font-semibold text-ink">${site.name}</p> <p class="text-sm text-black/70">${site.slogan}</p> <div class="text-sm text-black/70"> <p>Email : <a class="text-accent underline"${addAttribute(`mailto:${site.email}`, "href")}>${site.email}</a></p> <p>Téléphone : <a class="text-accent underline"${addAttribute(`tel:${site.phone.replace(/\s+/g, "")}`, "href")}>${site.phone}</a></p> <p>Site : <a class="text-accent underline"${addAttribute(site.url, "href")}>${site.url}</a></p> </div> </div> <div class="space-y-2 text-sm"> <p class="font-semibold">Liens utiles</p> <ul class="space-y-1"> <li><a class="focus-ring hover:text-accent" href="/services/">Services</a></li> <li><a class="focus-ring hover:text-accent" href="/realisations/">Réalisations</a></li> <li><a class="focus-ring hover:text-accent" href="/blog/">Blog</a></li> <li><a class="focus-ring hover:text-accent" href="/contact/">Contact</a></li> </ul> </div> <div class="space-y-2 text-sm"> <p class="font-semibold">Légal</p> <ul class="space-y-1"> <li><a class="focus-ring hover:text-accent" href="/mentions-legales/">Mentions légales</a></li> <li><a class="focus-ring hover:text-accent" href="/politique-confidentialite/">Politique de confidentialité</a></li> <li><a class="focus-ring hover:text-accent" href="/cookies/">Cookies</a></li> </ul> </div> </div> <div class="border-t border-black/10 px-6 py-4 text-center text-xs text-black/60">
© ${(/* @__PURE__ */ new Date()).getFullYear()} ${site.name}. Tous droits réservés.
</div> </footer>`;
}, "C:/Git/Nat 2026/Clicom-site-2026/src/components/Footer.astro", void 0);

export { $$BaseLayout as $, $$Navbar as a, $$Footer as b };
