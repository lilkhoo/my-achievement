const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                my: {
                    'pink': '#EA6DC5',
                    'purple': '#CB89F3',
                    'dark': '#44314F',
                }
            },
            fontFamily: {
                'viga': '"viga", sans-serif',
                'montserrat': '"montserrat", sans-serif',
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            minWidth: {
                '7rem': '7rem',
            },
            maxWidth: {
                '7rem': '7rem',
            },
            minHeight: {
                '7rem': '7rem',
            },
            maxHeight: {
                '7rem': '7rem',
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
