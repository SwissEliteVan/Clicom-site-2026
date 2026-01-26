import { b as createAstro, c as createComponent, m as maybeRenderHead, d as addAttribute, e as renderSlot, a as renderTemplate } from './astro/server_BbL4JxFn.mjs';
import 'kleur/colors';
import 'clsx';
/* empty css                           */

const $$Astro = createAstro("https://clicom.ch");
const $$CTAButton = createComponent(($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro, $$props, $$slots);
  Astro2.self = $$CTAButton;
  const { href, variant = "primary", label, icon } = Astro2.props;
  const baseClasses = "focus-ring inline-flex items-center justify-center gap-2 px-6 py-3 font-display font-semibold text-[0.9375rem] transition-all duration-200 ease-out";
  const variantClasses = {
    primary: "bg-[var(--accent-primary)] text-[var(--text-inverse)] border-0 rounded-[var(--radius-md)] hover:bg-[var(--accent-hover)] hover:shadow-[var(--shadow-md)] hover:-translate-y-0.5",
    secondary: "bg-transparent text-[var(--text-primary)] border border-[var(--border-strong)] rounded-[var(--radius-md)] hover:border-[var(--accent-primary)] hover:text-[var(--accent-primary)] hover:bg-[var(--accent-soft)]"
  };
  return renderTemplate`${maybeRenderHead()}<a${addAttribute(href, "href")}${addAttribute(`${baseClasses} ${variantClasses[variant]}`, "class")}${addAttribute(label, "aria-label")} data-astro-cid-pxxnplno> ${renderSlot($$result, $$slots["default"])} ${icon && renderTemplate`<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" data-astro-cid-pxxnplno> <path d="M5 12h14M12 5l7 7-7 7" data-astro-cid-pxxnplno></path> </svg>`} </a> `;
}, "C:/Git/Clicom-site-2026/src/components/CTAButton.astro", void 0);

export { $$CTAButton as $ };
