/* empty css                                   */
import { c as createComponent, r as renderComponent, a as renderTemplate, m as maybeRenderHead } from '../chunks/astro/server_BbL4JxFn.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../chunks/Footer_D8jxgJpx.mjs';
import { $ as $$CTAButton } from '../chunks/CTAButton_RvQ7QYcg.mjs';
export { renderers } from '../renderers.mjs';

const $$404 = createComponent(($$result, $$props, $$slots) => {
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "Page introuvable | Clic COM", "description": "La page demand\xE9e n'existe pas ou a \xE9t\xE9 d\xE9plac\xE9e." }, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "" })} ${maybeRenderHead()}<main class="mx-auto flex min-h-[60vh] max-w-4xl flex-col items-start justify-center px-6 py-16"> <p class="text-sm font-semibold uppercase text-accent">Erreur 404</p> <h1 class="mt-2 text-4xl font-semibold text-ink">Page introuvable</h1> <p class="mt-4 text-lg text-black/70">
La page que vous cherchez n'existe pas. Revenez à l'accueil ou contactez-nous si
      besoin.
</p> <div class="mt-6 flex flex-wrap gap-3"> ${renderComponent($$result2, "CTAButton", $$CTAButton, { "href": "/", "label": "Retour \xE0 l'accueil" }, { "default": ($$result3) => renderTemplate`
Retour à l'accueil
` })} ${renderComponent($$result2, "CTAButton", $$CTAButton, { "href": "/contact/", "variant": "secondary", "label": "Contact" }, { "default": ($$result3) => renderTemplate`
Contact
` })} </div> </main> ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
}, "C:/Git/Clicom-site-2026/src/pages/404.astro", void 0);

const $$file = "C:/Git/Clicom-site-2026/src/pages/404.astro";
const $$url = "/404";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$404,
  file: $$file,
  url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
