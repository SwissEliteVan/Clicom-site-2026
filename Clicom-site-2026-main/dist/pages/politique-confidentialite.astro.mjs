/* empty css                                   */
import { c as createComponent, r as renderComponent, a as renderTemplate, m as maybeRenderHead, d as addAttribute } from '../chunks/astro/server_BbL4JxFn.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../chunks/Footer_h6LQB7Eu.mjs';
import { s as site } from '../chunks/site_CV2KWidJ.mjs';
export { renderers } from '../renderers.mjs';

const $$PolitiqueConfidentialite = createComponent(($$result, $$props, $$slots) => {
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "Politique de confidentialit\xE9 | Clic COM", "description": "Politique de confidentialit\xE9 conforme \xE0 la nLPD suisse.", "breadcrumbs": [
    { name: "Accueil", item: "/" },
    { name: "Politique de confidentialit\xE9", item: "/politique-confidentialite/" }
  ] }, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "/politique-confidentialite/" })} ${maybeRenderHead()}<main class="mx-auto max-w-4xl px-6 py-16"> <h1 class="text-4xl font-semibold text-ink">Politique de confidentialité</h1> <div class="mt-6 space-y-6 text-sm text-black/70"> <p>
Cette politique décrit comment ${site.name} traite les données personnelles conformément
        à la nouvelle Loi fédérale sur la protection des données (nLPD).
</p> <section class="space-y-2"> <h2 class="text-lg font-semibold text-ink">Données collectées</h2> <ul class="list-disc pl-5"> <li>Données de contact : nom, email, téléphone, entreprise.</li> <li>Contenu des messages envoyés via le formulaire.</li> <li>Données techniques anonymes si vous activez l'analytics (optionnel).</li> </ul> </section> <section class="space-y-2"> <h2 class="text-lg font-semibold text-ink">Finalités</h2> <ul class="list-disc pl-5"> <li>Répondre aux demandes entrantes et préparer un devis.</li> <li>Améliorer la qualité du service et des contenus.</li> <li>Respecter nos obligations légales et contractuelles.</li> </ul> </section> <section class="space-y-2"> <h2 class="text-lg font-semibold text-ink">Base légale</h2> <p>
Le traitement repose sur votre consentement (formulaire), l'exécution de mesures
          précontractuelles et notre intérêt légitime à améliorer notre service.
</p> </section> <section class="space-y-2"> <h2 class="text-lg font-semibold text-ink">Durée de conservation</h2> <p>
Les données sont conservées aussi longtemps que nécessaire pour répondre à votre
          demande, puis archivées conformément aux obligations légales.
</p> </section> <section class="space-y-2"> <h2 class="text-lg font-semibold text-ink">Droits</h2> <p>
Vous pouvez demander l'accès, la rectification ou la suppression de vos données en
          écrivant à <a class="text-accent underline"${addAttribute(`mailto:${site.email}`, "href")}>${site.email}</a>.
</p> </section> <section class="space-y-2"> <h2 class="text-lg font-semibold text-ink">Partage</h2> <p>
Nous ne partageons pas vos données avec des tiers sauf obligation légale ou si un
          prestataire technique est nécessaire (hébergement, messagerie). Aucun transfert
          inutile hors Suisse sans garantie adéquate.
</p> </section> <section class="space-y-2"> <h2 class="text-lg font-semibold text-ink">Contact</h2> <p>
Pour toute question relative à la protection des données, contactez-nous via
<a class="text-accent underline"${addAttribute(`mailto:${site.email}`, "href")}>${site.email}</a>.
</p> </section> </div> </main> ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
}, "C:/Git/Clicom-site-2026/src/pages/politique-confidentialite.astro", void 0);

const $$file = "C:/Git/Clicom-site-2026/src/pages/politique-confidentialite.astro";
const $$url = "/politique-confidentialite";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$PolitiqueConfidentialite,
  file: $$file,
  url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
