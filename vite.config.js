import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/css/dashboard.css',
                'resources/css/guest.css',
                'resources/css/welcome.css',
                'resources/css/cruds.css',
                'resources/js/cruds.js',
            ],
            refresh: true,
        }),
    ],
});
