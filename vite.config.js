import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import fs from 'fs';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
        // port:9000,
         host: 'refactored-eureka-wqj94gwpjjxc5p69-5173.app.github.dev/workspaces/WeCare',
        // strictPort: true,
        cors: {
            origin: [  
              "*"
            ], 
        },
        https:true,
        
        hmr: {
            host: 'refactored-eureka-wqj94gwpjjxc5p69.github.dev/workspaces/WeCare',
        },
    },
    
});
