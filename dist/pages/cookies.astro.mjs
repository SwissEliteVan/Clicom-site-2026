/* empty css                                   */
import { c as createComponent, r as renderComponent, a as renderTemplate, m as maybeRenderHead } from '../chunks/astro/server_BbL4JxFn.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../chunks/Footer_D8jxgJpx.mjs';
export { renderers } from '../renderers.mjs';

const $$Cookies = createComponent(($$result, $$props, $$slots) => {
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "Cookies | Clic COM", "description": "Informations sur l'utilisation des cookies et des pr\xE9f\xE9rences analytics.", "breadcrumbs": [{ name: "Accueil", item: "/" }, { name: "Cookies", item: "/cookies/" }] }, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "/cookies/" })} ${maybeRenderHead()}<main class="mx-auto max-w-4xl px-6 py-16"> <h1 class="text-4xl font-semibold text-ink">Cookies</h1> <div class="mt-6 space-y-4 text-sm text-black/70"> <p>
Ce site ne dépose aucun cookie de suivi par défaut. Vous pouvez activer les
        analytics via la bannière pour aider à améliorer la performance.
</p> <p>
Si l'analytics est activé, un identifiant anonymisé peut être stocké localement
        afin de mesurer le trafic global. Aucun suivi publicitaire n'est utilisé.
</p> <p>
Vous pouvez modifier votre choix en effaçant le stockage local de votre navigateur
        (clé : <code>clicom-analytics-consent</code>).
</p> </div> </main> ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
}, "C:/Git/Clicom-site-2026/src/pages/cookies.astro", void 0);

const $$file = "C:/Git/Clicom-site-2026/src/pages/cookies.astro";
const $$url = "/cookies";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Cookies,
  file: $$file,
  url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
