let mix = require('laravel-mix');
// let LiveReloadPlugin = require('webpack-livereload-plugin');

// mix.webpackConfig({
//     plugins: [new LiveReloadPlugin()]
// });


mix.setPublicPath('public');
mix.ts('resources/js/index.tsx', 'public/js/index.js');
mix.postCss('resources/css/main.css', 'public/css/style.css');
