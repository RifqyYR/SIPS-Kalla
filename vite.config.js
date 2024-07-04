import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'public/js/chart.js',
                'public/js/main.js',
            ],
            refresh: true,
        }),
    ],
});
