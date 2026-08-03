import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from "@tailwindcss/vite";
import react from '@vitejs/plugin-react';
import path from 'path';

export default defineConfig({
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
        },
    },
    optimizeDeps: {
        include: ['ziggy-js', 'qs-esm'],
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.jsx'],
            refresh: true,
        }),
        react({ fastRefresh: false }),
        tailwindcss(),
    ],
    server: {
        host: '0.0.0.0',
        port: 5176,
        strictPort: true,
        cors: true,
        origin: 'http://localhost:5176',
        hmr: {
            host: 'localhost',
            port: 5176,
        },
    },
});