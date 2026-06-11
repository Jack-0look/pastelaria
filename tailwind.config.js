import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

        theme: {
        extend: {
            colors: {
                'dark-chocolate': '#3B2A1F',
                'aloewood': '#7F5836',
                'milk-tea': '#AA7F66',
                'sakura': '#EC9C9D',
                'gold': '#F2CF2A',
                'white': '#ffffff',
            },
        },
    },

    plugins: [forms],
};
