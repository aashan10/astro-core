let mix = require('laravel-mix');


mix.ts('resources/js/index.tsx', 'public/js/index.js')
    .postCss('resources/css/main.css', 'public/css/style.css')
    .extract(['react'], 'public/js/react.js')
    .minify('public/js/react.js', 'public/js/react.min.js');