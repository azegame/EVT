//import defaultTheme from 'tailwindcss/defaultTheme';
//import forms from '@tailwindcss/forms';
const defaultTheme = require('tailwindcss/defaultTheme');
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        screens: {
            'sm': '830px',
            extend: {
                fontFamily: {
                    sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                },
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('flowbite/plugin')],

    darkMode: 'media',
};
