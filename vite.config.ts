import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import tailwindcss from '@tailwindcss/vite';
import { defineConfig } from 'vite';
import postcss  from 'postcss'
import prefixwrap from 'postcss-prefixwrap'
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.ts'],
            ssr: 'resources/js/ssr.ts',
            refresh: true,
        }),
        tailwindcss(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        {
            name: 'vite:prefix-coreui',
            enforce: 'pre',            // radi *pre* ostalim transformacijama
            async transform(code, id) {
                // filtriraj po path-u fajla koji Vite obrađuje
                if (!id.endsWith('/@coreui/coreui/dist/css/coreui.min.css')) {
                    return null
                }
                // postcss proces sa prefixwrap
                const result = await postcss([
                    prefixwrap('.coreui-scope')
                ]).process(code, { from: id })
                return {
                    code: result.css,
                    map: result.map
                }
            }
        }
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources/js'),
        },
    },
    optimizeDeps: {
        include: ['flowbite'],
    },
});
