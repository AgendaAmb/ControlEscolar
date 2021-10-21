const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/admin.js', 'public/js').vue();
mix.js('resources/js/rubrica.js', 'public/js').vue();
mix.js('resources/js/preregistro.js', 'public/js').vue();
mix.js('resources/js/postulacion.js', 'public/js').vue();
mix.js('resources/js/entrevistas.js', 'public/js').vue();