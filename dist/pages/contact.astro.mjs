/* empty css                                   */
import { c as createComponent, r as renderComponent, a as renderTemplate, m as maybeRenderHead, d as addAttribute } from '../chunks/astro/server_BbL4JxFn.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout, a as $$Navbar, b as $$Footer } from '../chunks/Footer_D8jxgJpx.mjs';
import { s as site } from '../chunks/site_CV2KWidJ.mjs';
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
</button> </form> <aside class="space-y-6"> <div class="rounded-3xl border border-black/10 bg-black/5 p-6"> <h2 class="text-lg font-semibold text-ink">Coordonnées</h2> <div class="mt-4 space-y-3 text-sm text-black/70"> <div> <p class="font-semibold text-ink">Email</p> <a class="text-accent hover:underline"${addAttribute(`mailto:${site.email}`, "href")}>${site.email}</a> </div> <div> <p class="font-semibold text-ink">Téléphone</p> <a class="text-accent hover:underline"${addAttribute(`tel:${site.phone.replace(/\s+/g, "")}`, "href")}>${site.phone}</a> </div> <div> <p class="font-semibold text-ink">Site web</p> <a class="text-accent hover:underline"${addAttribute(site.url, "href")}>${site.url}</a> </div> </div> </div> <div class="rounded-3xl border border-black/10 bg-white p-6"> <h2 class="text-lg font-semibold text-ink mb-4">Horaires d'ouverture</h2> <div class="space-y-2 text-sm"> <div class="flex justify-between"> <span class="text-black/70">Lundi - Vendredi</span> <span class="font-semibold text-ink">9h00 - 18h00</span> </div> <div class="flex justify-between"> <span class="text-black/70">Samedi</span> <span class="font-semibold text-ink">Sur rendez-vous</span> </div> <div class="flex justify-between"> <span class="text-black/70">Dimanche</span> <span class="font-semibold text-ink">Fermé</span> </div> </div> <div class="mt-4 rounded-2xl border border-black/10 bg-black/5 p-3 text-xs text-black/60"> <strong>Disponibilités :</strong> Réponse aux emails sous 24h en semaine.
            Pour les urgences, n'hésitez pas à nous appeler directement.
</div> </div> <div class="rounded-3xl border border-black/10 bg-white p-6"> <h2 class="text-lg font-semibold text-ink mb-4">Localisation</h2> <p class="text-sm text-black/70 mb-4">
Basé en Suisse romande. Interventions possibles dans toute la Suisse francophone.
</p> <div class="aspect-video rounded-2xl bg-gradient-to-br from-accent/10 to-accent/5 flex items-center justify-center border border-black/10"> <div class="text-center p-6"> <div class="text-4xl mb-2">📍</div> <p class="text-sm font-semibold text-ink">Carte interactive</p> <p class="text-xs text-black/60 mt-1">
La carte Google Maps sera intégrée ici avec la localisation exacte de l'agence.
</p> </div> </div> <p class="text-xs text-black/60 mt-3">
Note : L'intégration de la carte nécessite l'adresse précise de l'agence et une clé API Google Maps.
</p> </div> </aside> </div> <!-- Section supplémentaire --> <div class="mt-16 space-y-8"> <h2 class="text-2xl font-semibold text-ink">Pourquoi nous contacter ?</h2> <div class="grid gap-6 md:grid-cols-3"> <div class="rounded-2xl border border-black/10 bg-white p-6 shadow-soft"> <div class="text-3xl mb-3">💬</div> <h3 class="font-semibold text-ink">Audit gratuit</h3> <p class="mt-2 text-sm text-black/70">
Profitez d'un audit gratuit de votre présence en ligne avec des recommandations concrètes.
</p> </div> <div class="rounded-2xl border border-black/10 bg-white p-6 shadow-soft"> <div class="text-3xl mb-3">📋</div> <h3 class="font-semibold text-ink">Devis personnalisé</h3> <p class="mt-2 text-sm text-black/70">
Recevez un devis détaillé adapté à vos besoins et votre budget sous 48h.
</p> </div> <div class="rounded-2xl border border-black/10 bg-white p-6 shadow-soft"> <div class="text-3xl mb-3">🎯</div> <h3 class="font-semibold text-ink">Conseil stratégique</h3> <p class="mt-2 text-sm text-black/70">
Besoin d'un avis ? Nous vous proposons un premier échange sans engagement.
</p> </div> </div> </div> <!-- FAQ Contact --> <div class="mt-16 rounded-3xl border border-black/10 bg-gradient-to-br from-white to-black/5 p-8"> <h2 class="text-2xl font-semibold text-ink mb-6">Questions fréquentes</h2> <div class="space-y-4"> <div class="rounded-2xl border border-black/10 bg-white p-4"> <p class="font-semibold text-ink">Quel est le délai de réponse ?</p> <p class="mt-2 text-sm text-black/70">
Nous répondons généralement sous 24h en semaine. Pour les demandes urgentes, privilégiez le téléphone.
</p> </div> <div class="rounded-2xl border border-black/10 bg-white p-4"> <p class="font-semibold text-ink">Peut-on prendre rendez-vous ?</p> <p class="mt-2 text-sm text-black/70">
Oui, nous organisons des rendez-vous physiques ou en visio selon vos préférences. Indiquez-le dans le formulaire.
</p> </div> <div class="rounded-2xl border border-black/10 bg-white p-4"> <p class="font-semibold text-ink">Intervenez-vous partout en Suisse ?</p> <p class="mt-2 text-sm text-black/70">
Nous sommes basés en Suisse romande mais intervenons dans toute la Suisse francophone, et au-delà pour les projets digitaux.
</p> </div> </div> </div> </main> ${renderComponent($$result2, "Footer", $$Footer, {})} ` })}`;
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
