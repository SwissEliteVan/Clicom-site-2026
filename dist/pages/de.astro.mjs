/* empty css                                   */
import { c as createComponent, r as renderComponent, a as renderTemplate, m as maybeRenderHead } from '../chunks/astro/server_PoaPgSBg.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../chunks/Footer_WL_g8g0y.mjs';
import { $ as $$CTAButton } from '../chunks/CTAButton_BQd-S80j.mjs';
export { renderers } from '../renderers.mjs';

const $$Index = createComponent(($$result, $$props, $$slots) => {
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "Clic COM | Marketing, das verkauft", "description": "Minimale deutsche Version. Voller Inhalt auf Franz\xF6sisch verf\xFCgbar.", "lang": "de", "breadcrumbs": [{ name: "Start", item: "/de/" }] }, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "/de/" })} ${maybeRenderHead()}<main class="mx-auto max-w-4xl px-6 py-16"> <h1 class="text-4xl font-semibold text-ink">Marketing, das verkauft (nicht nur glänzt).</h1> <p class="mt-4 text-lg text-black/70">
Dies ist eine minimale deutsche Version. Voller Inhalt ist auf Französisch verfügbar.
</p> <div class="mt-6"> ${renderComponent($$result2, "CTAButton", $$CTAButton, { "href": "/contact/", "label": "Kontakt aufnehmen" }, { "default": ($$result3) => renderTemplate`
Kontakt aufnehmen
` })} </div> </main> ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
}, "C:/Git/Clicom-site-2026/src/pages/de/index.astro", void 0);

const $$file = "C:/Git/Clicom-site-2026/src/pages/de/index.astro";
const $$url = "/de";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Index,
  file: $$file,
  url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
