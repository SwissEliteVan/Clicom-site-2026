import { d as createAstro, c as createComponent, m as maybeRenderHead, b as addAttribute, h as renderSlot, a as renderTemplate } from './astro/server_PoaPgSBg.mjs';
import 'kleur/colors';
import 'clsx';

const $$Astro = createAstro("https://clicom.ch");
const $$CTAButton = createComponent(($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro, $$props, $$slots);
  Astro2.self = $$CTAButton;
  const { href, variant = "primary", label } = Astro2.props;
  const base = "focus-ring inline-flex items-center justify-center rounded-full px-6 py-3 text-sm font-semibold transition";
  const styles = {
    primary: "bg-accent text-white hover:opacity-90",
    secondary: "border border-ink text-ink hover:border-accent hover:text-accent"
  };
  return renderTemplate`${maybeRenderHead()}<a${addAttribute(href, "href")}${addAttribute(`${base} ${styles[variant]}`, "class")}${addAttribute(label, "aria-label")}> ${renderSlot($$result, $$slots["default"])} </a>`;
}, "C:/Git/Clicom-site-2026/src/components/CTAButton.astro", void 0);

export { $$CTAButton as $ };
