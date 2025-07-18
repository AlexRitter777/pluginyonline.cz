import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/public/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        container: {
            center: true,
            padding: '1rem',
        },
        colors: {
            current: 'currentColor',
            transparent: 'transparent',
            white: '#FFFFFF',
            black: '#090E34',
            dark: '#1D2144',
            primary: '#4A6CF7',
            yellow: '#FBB040',
            red: {
                '50': '#fdf2f2',
                '100': '#fde8e8',
                '200': '#fbd5d5',
                '300': '#f8b4b4',
                '400': '#f98080',
                '500': '#f05252',
                '600': '#e02424',
                '700': '#c81e1e',
                '800': '#9b1c1c',
                '900': '#771d1d',
            },
            purple: {
                '50': '#f6f5ff',
                '100': '#edebfe',
                '200': '#dcd7fe',
                '300': '#cabffd',
                '400': '#ac94fa',
                '500': '#9061f9',
                '600': '#7e3af2',
                '700': '#6c2bd9',
                '800': '#5521b5',
                '900': '#4a1d96',
            },
            'body-color': '#959CB1',
        },
        screens: {
            xsm: '380px',

            sm: '540px',
            // => @media (min-width: 576px) { ... }

            md: '720px',
            // => @media (min-width: 768px) { ... }

            lg: '960px',
            // => @media (min-width: 992px) { ... }

            xl: '1140px',
            // => @media (min-width: 1200px) { ... }

            '2xl': '1320px',
            // => @media (min-width: 1400px) { ... }
        },
        extend: {
            boxShadow: {
                signUp: "0px 5px 10px rgba(4, 10, 34, 0.2)",
                image: "0px 3px 30px rgba(9, 14, 52, 0.1)",
                pricing: "0px 34px 68px rgba(0, 0, 0, 0.06)",
                testimonial: "0px 8px 40px -10px rgba(9, 14, 52, 0.1)",
                service: "0px 11px 41px -11px rgba(9, 14, 52, 0.1)",
                blog: "0px 40px 150px -35px rgba(0, 0, 0, 0.05)",
            },
        },
    },
    safelist: ["sticky", "navbarTogglerActive", "hidden", "active-thumbnail", "notyf__toast", ".grecaptcha-badge"],
    plugins: [

    ],
};
