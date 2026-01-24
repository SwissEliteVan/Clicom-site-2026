/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{astro,html,js,jsx,md,mdx,ts,tsx}"] ,
  theme: {
    extend: {
      colors: {
        accent: "#5B2EFF",
        ink: "#111111",
        "gray-50": "#FAFAFA",
        "gray-100": "#F5F5F5",
        "gray-200": "#E8E8E8",
        "gray-800": "#1F1F1F",
        "gray-900": "#111111",
      },
      fontFamily: {
        sans: ["Outfit", "Inter", "DM Sans", "system-ui", "-apple-system", "sans-serif"],
        display: ["Outfit", "system-ui", "sans-serif"],
        body: ["Inter", "system-ui", "sans-serif"],
      },
      boxShadow: {
        soft: "0 4px 24px rgba(91, 46, 255, 0.06)",
        "soft-lg": "0 8px 40px rgba(91, 46, 255, 0.08)",
        "tech": "0 1px 3px rgba(17, 17, 17, 0.04), 0 0 0 1px rgba(17, 17, 17, 0.04)",
        "tech-hover": "0 4px 16px rgba(91, 46, 255, 0.12)",
      },
      backgroundImage: {
        "grid-pattern": "linear-gradient(rgba(91, 46, 255, 0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(91, 46, 255, 0.03) 1px, transparent 1px)",
        "tech-gradient": "linear-gradient(135deg, rgba(91, 46, 255, 0.05) 0%, transparent 100%)",
        "tech-radial": "radial-gradient(circle at 50% 0%, rgba(91, 46, 255, 0.08), transparent 70%)",
      },
      backgroundSize: {
        "grid": "40px 40px",
      },
      borderRadius: {
        "tech": "2px",
        "tech-lg": "8px",
        "tech-xl": "16px",
      },
    },
  },
  plugins: [],
};
