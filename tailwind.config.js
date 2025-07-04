import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'class', // 🔑 включаем классический режим 'class'
    theme: {
        extend: {
            fontFamily: {
                sans: ['Lato', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                bright: {
                    200: '#ECEBF3',
                    300: '#E5E5E5',
                    400: '#D9D9D9'
                },
                maroon: {
                    500: '#ECEBF3'
                },
                red: {
                    50: '#E5E2EA',
                    100: '#C4BDC4',
                    300: '#9C8E95',
                    500: '#3C1F24',
                    700: '#240309'
                },
                green: {
                    300: '#E6EFE8'
                }
            },
            screens: {
                '2xl': {'max': '1535px'}, // => @media (max-width: 1535px) { ... }
                'xl': {'max': '1279px'}, // => @media (max-width: 1279px) { ... }
                'lg': {'max': '1023px'}, // => @media (max-width: 1023px) { ... }
                'md': {'max': '767px'}, // => @media (max-width: 767px) { ... }
                'sm': {'max': '639px'}, // => @media (max-width: 639px) { ... }
            },
        },
    },
    plugins: [forms],
};
