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
//mix.setPublicPath('./controlescolar/');
mix.js('resources/js/app.js', 'public/js').vue().sass('resources/sass/app.scss', 'public/css');
mix.js('resources/js/admin/admin.js', 'public/js').vue();

// Pre-registro
mix.js('resources/js/pre-registro/preregistro.js', 'public/js').vue();

// Postulación
mix.js('resources/js/postulacion/postulacion.js', 'public/js').vue();
mix.js('resources/js/postulacion/appliant-view/appliant.js', 'public/appliant/js').vue();
mix.js('resources/js/postulacion/professor-view/professor.js', 'public/professor/js').vue();
mix.js('resources/js/recommendation-letter/recommendation-letter.js', 'public/js').vue();
mix.js('resources/js/postulacion/intention-letter.js', 'public/js').vue();

// Entrevistas
mix.js('resources/js/entrevistas/entrevistas.js', 'public/js').vue();
mix.js('resources/js/entrevistas-profesor/programaEntrevistas.js', 'public/js').vue();
mix.js('resources/js/rubrica/rubrica.js', 'public/js').vue();