let mix = require('laravel-mix');


mix.ts('resources/js/index.tsx', 'public/js/index.js').react();
mix.postCss('resources/css/main.css', 'public/css/style.css');
mix.extract(['react'], 'public/js/react.js');
mix.minify('public/js/react.js', 'public/js/react.min.js');