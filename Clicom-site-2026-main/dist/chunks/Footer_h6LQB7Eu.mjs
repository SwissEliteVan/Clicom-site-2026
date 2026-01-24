import { b as createAstro, c as createComponent, a as renderTemplate, e as renderSlot, f as renderHead, d as addAttribute, m as maybeRenderHead } from './astro/server_BbL4JxFn.mjs';
import 'kleur/colors';
import 'clsx';
/* empty css                           */
import { s as site, n as navigation, l as locales } from './site_CV2KWidJ.mjs';

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
  return renderTemplate(_b || (_b = __template(["<html", '> <head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>', '</title><meta name="description"', '><link rel="canonical"', '><!-- Google Fonts - Tech Abstract Premium --><link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"><meta property="og:title"', '><meta property="og:description"', '><meta property="og:type" content="website"><meta property="og:url"', '><meta property="og:site_name"', '><meta name="twitter:card" content="summary_large_image"><meta name="twitter:title"', '><meta name="twitter:description"', '><meta name="theme-color" content="#5B2EFF">', "", '</head> <body class="min-h-screen bg-white text-ink"> ', ` <div id="cookie-banner" class="fixed bottom-4 left-4 right-4 z-50 hidden max-w-xl rounded-2xl border border-black/10 bg-white p-4 shadow-soft" role="dialog" aria-live="polite" aria-label="Pr\xE9f\xE9rences cookies"> <div class="flex flex-col gap-3 text-sm"> <p>
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
    <\/script> </body> </html>`])), addAttribute(lang, "lang"), title, addAttribute(description, "content"), addAttribute(canonical, "href"), addAttribute(title, "content"), addAttribute(description, "content"), addAttribute(canonical, "content"), addAttribute(site.name, "content"), addAttribute(title, "content"), addAttribute(description, "content"), schemas.length > 0 && renderTemplate(_a || (_a = __template(['<script type="application/ld+json">{JSON.stringify(schemas)}<\/script>']))), renderHead(), renderSlot($$result, $$slots["default"]));
}, "C:/Git/Clicom-site-2026/src/layouts/BaseLayout.astro", void 0);

const $$Astro = createAstro("https://clicom.ch");
const $$Navbar = createComponent(($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro, $$props, $$slots);
  Astro2.self = $$Navbar;
  const { current } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<header class="tech-navbar" data-astro-cid-5blmo7yk> <div class="container-tech flex items-center justify-between py-4" data-astro-cid-5blmo7yk> <!-- Logo --> <a href="/" class="tech-logo" aria-label="Retour à l'accueil" data-astro-cid-5blmo7yk> <svg width="8" height="8" viewBox="0 0 8 8" fill="currentColor" class="tech-logo-dot" aria-hidden="true" data-astro-cid-5blmo7yk> <circle cx="4" cy="4" r="4" data-astro-cid-5blmo7yk></circle> </svg> <span class="tech-logo-text" data-astro-cid-5blmo7yk>${site.name}</span> </a> <!-- Desktop Navigation --> <nav class="tech-nav-desktop" aria-label="Navigation principale" data-astro-cid-5blmo7yk> ${navigation.map((item) => renderTemplate`<a${addAttribute(item.href, "href")}${addAttribute(`tech-nav-link ${current === item.href ? "tech-nav-link-active" : ""}`, "class")} data-astro-cid-5blmo7yk> ${item.label} </a>`)} </nav> <!-- Language Switcher (Desktop) --> <div class="tech-lang-switcher" data-astro-cid-5blmo7yk> ${locales.map((locale) => renderTemplate`<a class="tech-lang-button"${addAttribute(locale.href, "href")}${addAttribute(`Version ${locale.label}`, "aria-label")} data-astro-cid-5blmo7yk> ${locale.label} </a>`)} </div> <!-- CTA Mobile --> <a href="/contact/" class="tech-cta-mobile" aria-label="Demander un devis" data-astro-cid-5blmo7yk>
Devis
</a> </div> <!-- Mobile Navigation --> <div class="tech-nav-mobile-wrapper" data-astro-cid-5blmo7yk> <div class="container-tech flex flex-wrap gap-4 py-3" data-astro-cid-5blmo7yk> ${navigation.map((item) => renderTemplate`<a${addAttribute(item.href, "href")}${addAttribute(`tech-nav-link-mobile ${current === item.href ? "tech-nav-link-mobile-active" : ""}`, "class")} data-astro-cid-5blmo7yk> ${item.label} </a>`)} </div> </div> </header> `;
}, "C:/Git/Clicom-site-2026/src/components/Navbar.astro", void 0);

const $$Footer = createComponent(($$result, $$props, $$slots) => {
  const currentYear = (/* @__PURE__ */ new Date()).getFullYear();
  return renderTemplate`${maybeRenderHead()}<footer class="tech-footer" data-astro-cid-sz7xmlte> <div class="container-tech py-16" data-astro-cid-sz7xmlte> <div class="tech-footer-grid" data-astro-cid-sz7xmlte> <!-- Company Info --> <div class="tech-footer-company" data-astro-cid-sz7xmlte> <div class="tech-footer-brand" data-astro-cid-sz7xmlte> <svg width="8" height="8" viewBox="0 0 8 8" fill="currentColor" class="tech-footer-dot" aria-hidden="true" data-astro-cid-sz7xmlte> <circle cx="4" cy="4" r="4" data-astro-cid-sz7xmlte></circle> </svg> <p class="tech-footer-name" data-astro-cid-sz7xmlte>${site.name}</p> </div> <p class="tech-footer-slogan" data-astro-cid-sz7xmlte>${site.slogan}</p> <div class="tech-footer-contact" data-astro-cid-sz7xmlte> <div class="tech-contact-item" data-astro-cid-sz7xmlte> <span class="tech-contact-label" data-astro-cid-sz7xmlte>Email</span> <a${addAttribute(`mailto:${site.email}`, "href")} class="tech-contact-link" data-astro-cid-sz7xmlte>${site.email}</a> </div> <div class="tech-contact-item" data-astro-cid-sz7xmlte> <span class="tech-contact-label" data-astro-cid-sz7xmlte>Téléphone</span> <a${addAttribute(`tel:${site.phone.replace(/\s+/g, "")}`, "href")} class="tech-contact-link" data-astro-cid-sz7xmlte>${site.phone}</a> </div> <div class="tech-contact-item" data-astro-cid-sz7xmlte> <span class="tech-contact-label" data-astro-cid-sz7xmlte>Site</span> <a${addAttribute(site.url, "href")} class="tech-contact-link" data-astro-cid-sz7xmlte>${site.url}</a> </div> </div> </div> <!-- Useful Links --> <div class="tech-footer-section" data-astro-cid-sz7xmlte> <h3 class="tech-footer-title" data-astro-cid-sz7xmlte>Liens utiles</h3> <ul class="tech-footer-list" data-astro-cid-sz7xmlte> <li data-astro-cid-sz7xmlte><a href="/services/" class="tech-footer-link" data-astro-cid-sz7xmlte>Services</a></li> <li data-astro-cid-sz7xmlte><a href="/realisations/" class="tech-footer-link" data-astro-cid-sz7xmlte>Réalisations</a></li> <li data-astro-cid-sz7xmlte><a href="/blog/" class="tech-footer-link" data-astro-cid-sz7xmlte>Blog</a></li> <li data-astro-cid-sz7xmlte><a href="/contact/" class="tech-footer-link" data-astro-cid-sz7xmlte>Contact</a></li> </ul> </div> <!-- Legal --> <div class="tech-footer-section" data-astro-cid-sz7xmlte> <h3 class="tech-footer-title" data-astro-cid-sz7xmlte>Légal</h3> <ul class="tech-footer-list" data-astro-cid-sz7xmlte> <li data-astro-cid-sz7xmlte><a href="/mentions-legales/" class="tech-footer-link" data-astro-cid-sz7xmlte>Mentions légales</a></li> <li data-astro-cid-sz7xmlte><a href="/politique-confidentialite/" class="tech-footer-link" data-astro-cid-sz7xmlte>Politique de confidentialité</a></li> <li data-astro-cid-sz7xmlte><a href="/cookies/" class="tech-footer-link" data-astro-cid-sz7xmlte>Cookies</a></li> </ul> </div> </div> </div> <!-- Copyright --> <div class="tech-footer-bottom" data-astro-cid-sz7xmlte> <div class="container-tech py-6" data-astro-cid-sz7xmlte> <div class="tech-footer-copyright" data-astro-cid-sz7xmlte> <span data-astro-cid-sz7xmlte>© ${currentYear} ${site.name}. Tous droits réservés.</span> <span class="tech-footer-separator" aria-hidden="true" data-astro-cid-sz7xmlte>·</span> <span data-astro-cid-sz7xmlte>Conçu en Suisse</span> </div> </div> </div> </footer> `;
}, "C:/Git/Clicom-site-2026/src/components/Footer.astro", void 0);

export { $$BaseLayout as $, $$Navbar as a, $$Footer as b };
