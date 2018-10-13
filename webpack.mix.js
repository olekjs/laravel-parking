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
   .js('resources/assets/js/create-parking-model.js', 'public/js')
   .js('resources/assets/js/charts.js', 'public/js')
   .js('resources/assets/js/reservation.js', 'public/js');

   mix.sass('resources/assets/sass/app.scss', 'public/css')
   	  .sass('resources/assets/sass/nav-bar.scss', 'public/css')
   	  .sass('resources/assets/sass/conversation.scss', 'public/css');