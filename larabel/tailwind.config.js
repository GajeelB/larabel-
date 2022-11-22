/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/@themesberg/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            container: {
                center: true,
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@themesberg/flowbite/plugin')
    ],
}
