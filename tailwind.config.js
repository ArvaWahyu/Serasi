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
                warmred: {
                    DEFAULT: '#8B0000',
                    light: '#B22222',
                    dark: '#5C0000',
                },
                warmyellow: {
                    DEFAULT: '#FFD700',
                    light: '#FFEA70',
                    dark: '#BBA300',
                },
                warmbrown: {
                    DEFAULT: '#5C4033',
                    light: '#7B5E4B',
                    dark: '#3D2B1F',
                },
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
