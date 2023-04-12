/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                "Kanit-Black": ["Kanit-Black"],
                "Kanit-BlackItalic": ["Kanit-BlackItalic"],
                "TitilliumWeb-Bold": ["TitilliumWeb-Bold"],
                "TitilliumWeb-BoldItalic": ["TitilliumWeb-BoldItalic"],
                "TitilliumWeb-Regular": ["TitilliumWeb-Regular"],
                "TitilliumWeb-Black": ["TitilliumWeb-Black"],
            },
        },
    },
    plugins: [],
};
