import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import scrollbar from 'tailwind-scrollbar'

/** @type {import('tailwindcss').Config} */
export default {        
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.jsx',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: '#ffffff', /* white background */
                    100: '#bac5cc', /* dull white */
                    200: '#eaeaea', /* duller white */
                    300: 'rgba(32, 48, 58)', /* transparent dark */
                    400: '#2c3a43', /* button dark hover background */
                    500: '#021118', /* dark background */
                },
                vibrant: '#104aac', /* custom blue color */
            }
        },
    },

    plugins: [forms,scrollbar],
};
