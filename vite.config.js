import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';


export default defineConfig({

    plugins: [
        laravel({
            input: [
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
