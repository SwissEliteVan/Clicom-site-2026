/* empty css                                   */
import { c as createComponent, r as renderComponent, a as renderTemplate, m as maybeRenderHead, b as addAttribute } from '../chunks/astro/server_PoaPgSBg.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../chunks/Footer_WL_g8g0y.mjs';
import { s as site } from '../chunks/site_Csd5TUrh.mjs';
export { renderers } from '../renderers.mjs';

const $$Contact = createComponent(($$result, $$props, $$slots) => {
  const formAction = `mailto:${site.email}`;
  const formMethod = "POST";
  const formEncType = "text/plain";
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "Contact | Clic COM", "description": "Parlez de votre projet marketing ou web. Réponse rapide avec plan d'action clair.", "breadcrumbs": [{ name: "Accueil", item: "/" }, { name: "Contact", item: "/contact/" }] }, { "default": ($$result2) => renderTemplate` ${renderComponent($$result2, "Navbar", $$Navbar, { "current": "/contact/" })} ${maybeRenderHead()}<main class="mx-auto max-w-5xl px-6 py-16"> <div class="space-y-4"> <h1 class="text-4xl font-semibold text-ink">Contact</h1> <p class="text-lg text-black/70">
Décrivez votre besoin, nous vous répondons rapidement avec un plan clair et un
        devis aligné sur vos objectifs.
</p> </div> <div class="mt-10 grid gap-8 lg:grid-cols-[1.2fr,0.8fr]"> <form class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft"${addAttribute(formAction, "action")}${addAttribute(formMethod, "method")}${addAttribute(formEncType, "enctype")} aria-describedby="contact-note"> <p id="contact-note" class="text-xs text-black/60">
Les champs marqués * sont obligatoires. Vos données sont traitées selon notre
<a class="text-accent underline" href="/politique-confidentialite/">politique de confidentialité</a>.
</p> <div class="mt-6 grid gap-4 md:grid-cols-2"> <div class="space-y-2"> <label class="text-sm font-semibold" for="contact-nom">
Nom *
</label> <input id="contact-nom" class="focus-ring w-full rounded-xl border border-black/20 px-4 py-2" type="text" name="nom" autocomplete="name" required> </div> <div class="space-y-2"> <label class="text-sm font-semibold" for="contact-email">
Email *
</label> <input id="contact-email" class="focus-ring w-full rounded-xl border border-black/20 px-4 py-2" type="email" name="email" autocomplete="email" required> </div> <div class="space-y-2"> <label class="text-sm font-semibold" for="contact-telephone">
Téléphone (CH) *
</label> <input id="contact-telephone" class="focus-ring w-full rounded-xl border border-black/20 px-4 py-2" type="tel" name="telephone" pattern="[+0-9\\s]{6,}" autocomplete="tel" required> </div> <div class="space-y-2"> <label class="text-sm font-semibold" for="contact-entreprise">
Entreprise
</label> <input id="contact-entreprise" class="focus-ring w-full rounded-xl border border-black/20 px-4 py-2" type="text" name="entreprise" autocomplete="organization"> </div> </div> <label class="mt-4 block text-sm font-semibold" for="contact-budget">
Budget estimatif
</label> <select id="contact-budget" class="focus-ring mt-2 w-full rounded-xl border border-black/20 px-4 py-2" name="budget" required> <option value="">Sélectionner</option> <option value="moins-5k">Moins de 5k CHF</option> <option value="5k-15k">5k – 15k CHF</option> <option value="15k-30k">15k – 30k CHF</option> <option value="30k-plus">30k+ CHF</option> </select> <label class="mt-4 block text-sm font-semibold" for="contact-message">
Message *
</label> <textarea id="contact-message" class="focus-ring mt-2 min-h-[160px] w-full rounded-xl border border-black/20 px-4 py-2" name="message" required></textarea> <div class="mt-4 rounded-2xl border border-black/10 bg-black/5 p-3 text-xs text-black/70"> ${"Le formulaire utilise un email direct (mailto). Vous pouvez aussi écrire à hello@clicom.ch."} <p class="mt-2">
En soumettant ce formulaire, vous acceptez la politique de confidentialité.
</p> </div> <label class="sr-only" for="contact-website">
Ne pas remplir ce champ
</label> <input id="contact-website" class="hidden" type="text" name="website" tabindex="-1" autocomplete="off" aria-hidden="true"> <button class="focus-ring mt-6 rounded-full bg-accent px-6 py-3 text-sm font-semibold text-white" type="submit" aria-label="Envoyer la demande">
Envoyer
</button> </form> <aside class="rounded-3xl border border-black/10 bg-black/5 p-6"> <h2 class="text-lg font-semibold text-ink">Coordonnées</h2> <div class="mt-4 text-sm text-black/70"> <p>Email : <a class="text-accent underline"${addAttribute(`mailto:${site.email}`, "href")}>${site.email}</a></p> <p>Téléphone : <a class="text-accent underline"${addAttribute(`tel:${site.phone.replace(/\s+/g, "")}`, "href")}>${site.phone}</a></p> <p>Site : <a class="text-accent underline"${addAttribute(site.url, "href")}>${site.url}</a></p> <div class="mt-4 rounded-2xl border border-black/10 bg-white p-4 text-xs"> <p class="font-semibold text-ink">Bloc signature HTML</p> <p class="mt-2 text-black/60">
À intégrer ici dès réception de la signature fournie par le client.
</p> </div> </div> </aside> </div> </main> ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
}, "C:/Git/Clicom-site-2026/src/pages/contact.astro", void 0);
const $$file = "C:/Git/Clicom-site-2026/src/pages/contact.astro";
const $$url = "/contact";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Contact,
  file: $$file,
  url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
