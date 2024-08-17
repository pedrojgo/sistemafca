import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/css/home.css',
            'resources/css/students.css',
            'resources/css/assistances.css',
            'resources/css/users.css',
            'resources/js/home.js',
            'resources/js/students.js',
            'resources/js/app.js',
            'resources/js/users.js',
        ]),
    ],
});