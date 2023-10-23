/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            backgroundImage: {
                hero: "url('/public/image/hero.png')",
            },
            colors: {
                bg: "rgba(var(--color-bg), <alpha-value>)",
                primaryDark: "#EAE5D5",
                secondary: "rgba(var(--color-secondary), <alpha-value>)",
                accent: "rgba(var(--color-accent), <alpha-value>)",
            },
            fontFamily: {
                dmserif: ["DMSerifDisplay"],
                josefinsans: ["JosefinSans"],
            },
        },
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: [
          {
            customTheme: {
              "primary": "#F5F3E8",
              "secondary": "#005B49",
              "accent": "#F78764",  
              "neutral": "#F7F7F7",
              "base-100": "#EAE5D5",
              "base-200": "#E8E8E8",
              "base-300": "#7A7A7A",
              "info": "#",
              "success": "#06A385",
              "warning": "#",
              "error": "#E5383B",
            },
          },
        ],
    },
};
