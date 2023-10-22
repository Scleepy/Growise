/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                bg: "rgba(var(--color-bg), <alpha-value>)",
                accent: "rgba(var(--color-accent), <alpha-value>)",
                footer: "rgba(var(--color-footer), <alpha-value>)",
            },
            fontFamily: {
                dmserif: ["DMSerifDisplay"],
                josefinsans: ["JosefinSans"],
            },
        },
    },
    plugins: [require("daisyui")],
};
