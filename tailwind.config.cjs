/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{astro,html,js,jsx,md,mdx,ts,tsx}"] ,
  theme: {
    extend: {
      colors: {
        accent: "#5B2EFF",
        ink: "#111111",
      },
      fontFamily: {
        sans: ["system-ui", "-apple-system", "Segoe UI", "Arial", "sans-serif"],
      },
      boxShadow: {
        soft: "0 14px 30px rgba(17, 17, 17, 0.08)",
      },
    },
  },
  plugins: [],
};
