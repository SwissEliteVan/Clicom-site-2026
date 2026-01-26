/* empty css                                   */
import { c as createComponent, r as renderComponent, a as renderTemplate, m as maybeRenderHead } from '../chunks/astro/server_BbL4JxFn.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../chunks/Footer_h6LQB7Eu.mjs';
import { $ as $$CTAButton } from '../chunks/CTAButton_RvQ7QYcg.mjs';
export { renderers } from '../renderers.mjs';

const $$Index = createComponent(($$result, $$props, $$slots) => {
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "Clic COM | Marketing that sells", "description": "Minimal English version. Full content available in French.", "lang": "en", "breadcrumbs": [{ name: "Home", item: "/en/" }] }, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "/en/" })} ${maybeRenderHead()}<main class="mx-auto max-w-4xl px-6 py-16"> <h1 class="text-4xl font-semibold text-ink">Marketing that sells (not just shines).</h1> <p class="mt-4 text-lg text-black/70">
This is a minimal English version. The full content is available in French.
</p> <div class="mt-6"> ${renderComponent($$result2, "CTAButton", $$CTAButton, { "href": "/contact/", "label": "Contact Clic COM" }, { "default": ($$result3) => renderTemplate`
Contact us
` })} </div> </main> ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
}, "C:/Git/Clicom-site-2026/src/pages/en/index.astro", void 0);

const $$file = "C:/Git/Clicom-site-2026/src/pages/en/index.astro";
const $$url = "/en";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Index,
  file: $$file,
  url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
