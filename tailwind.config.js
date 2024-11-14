import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'selector',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': '#121212',
                'cold-black': '#181818',
                'dark-gray': '#404040',
                'light-gray': '#B3B3B3',
                'dark-blue': '#4A64E5',
                'light-blue': '#4D97E6',
            }
        },
    },
    plugins: [forms],
};
