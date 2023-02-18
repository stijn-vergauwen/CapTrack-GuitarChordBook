/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",],
    theme: {
        extend: {
            colors: {
                'primary': {
                    400: '#7AA8ED',
                    600: '#1C6CE5',
                    700: '#0044AA',
                },
            },
        },
    },
    plugins: [],
}
