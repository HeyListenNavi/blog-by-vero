import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import { ViteImageOptimizer } from 'vite-plugin-image-optimizer';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
        ViteImageOptimizer({
          png: {
            // https://sharp.pixelplumbing.com/api-output#png
            quality: 100,
          },
          jpeg: {
            // https://sharp.pixelplumbing.com/api-output#jpeg
            quality: 100,
          },
          jpg: {
            // https://sharp.pixelplumbing.com/api-output#jpeg
            quality: 100,
          },
          // gif does not support lossless compression
          // https://sharp.pixelplumbing.com/api-output#gif
          gif: {},
          webp: {
            // https://sharp.pixelplumbing.com/api-output#webp
            lossless: true,
          },
        })
    ],
    resolve: {
      alias: {
        '@': '/resources',
        '@images': '/resources/images',
        '@fonts': '/resources/fonts'
      },
    },
});
