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
                sans: ['Newsreader', ...defaultTheme.fontFamily.sans],
                // sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'bluebirds': '#F04A00',
                'parrots' : '#028A0F',
                'falcons' : '#66350F',
                'sparrows' : '#FFFFFF',
                'pelicans' : '#0A1172',
                'hawks' : '#702963',
                'terns' : '#616569',
                'cardinals' : '#B90E0A',
                'skylarks' : '#333333',
                'hummingbirds' : '#FC7F9C',
            },
        },

    },

    plugins: [forms],
};
