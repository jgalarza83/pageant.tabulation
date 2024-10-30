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
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            'sparrows' : '#ffffff',
            'falcons' : '#3C280D',
            'parrots' : '#028A0F',
            'bluebirds' : '#f04a00',
            'pelicans' : '#0A1172',
            'hawks' : '#702963',
            'terns' : '#616569',
            'cardinals' : '#b90e0a',
            'skylarks' : '#333333',
            'hummingbirds' : '#fc7f9c',
        }
    },

    plugins: [forms],
};
