const mix = require('laravel-mix');

mix.js([
    'resources/js/app.js',
    'resources/js/package.js',
], 'public/node/js');
mix.postCss('resources/css/app.css', 'public/node/css', [
    //
]);
