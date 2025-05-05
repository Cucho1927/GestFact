import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                `resources/css/styles.css`,
                `resources/css/admin.css`,
                `resources/css/reboot.min.css`,
                `resources/css/vistaModal.css`
            ],
            refresh: true,
        }),
    ],
});
