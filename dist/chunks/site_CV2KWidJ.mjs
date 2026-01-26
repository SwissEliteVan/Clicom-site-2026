const site = {
  name: "Clic COM",
  slogan: "Le marketing qui fait vendre (pas juste briller).",
  url: "https://clicom.ch",
  email: "hello@clicom.ch",
  phone: "+41 78 823 89 50"};
const navigation = [
  { label: "Accueil", href: "/" },
  { label: "Services", href: "/services/" },
  { label: "Réalisations", href: "/realisations/" },
  { label: "À propos", href: "/apropos/" },
  { label: "Blog", href: "/blog/" },
  { label: "Contact", href: "/contact/" }
];
const locales = [
  { label: "FR", href: "/" },
  { label: "EN", href: "/en/" },
  { label: "DE", href: "/de/" }
];

export { locales as l, navigation as n, site as s };
