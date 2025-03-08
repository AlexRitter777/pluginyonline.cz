import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';


export default defineConfig({

    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/public.css',
                'resources/js/public.js',
                'resources/css/admin.css',
                'resources/js/admin.js',
            ],
            refresh: true,
        }),
    ],


    resolve: {
        alias: {
            '$': 'jQuery',

        },
    },



});
