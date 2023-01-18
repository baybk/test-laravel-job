const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.react('resources/js/admin.js', 'public/js');
mix.react('resources/js/website.js', 'public/js');
mix.sass('resources/sass/app.scss', 'public/css');
