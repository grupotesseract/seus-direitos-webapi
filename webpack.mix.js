let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/welcome.js', 'public/js')
   .js('resources/assets/js/landingpage.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/welcome.scss', 'public/css')
   .sass('resources/assets/sass/carteirinha.scss', 'public/css')
   .sass('resources/assets/sass/framework/main.scss', 'public/css');
