process.env.DISABLE_NOTIFIER = true;
var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass([
        '../bower/prism/themes/prism.css',
        //'../bower/prism/themes/prism-okaidia.css',
        '../bower/sweetalert/dist/sweetalert.css',
        '../bower/medium-editor/dist/css/medium-editor.min.css',
        '../bower/medium-editor/dist/css/themes/flat.min.css',
        'app.sass',
    ]);
    mix.scripts([
        '../bower/prism/prism.js',
        '../bower/jquery/dist/jquery.min.js',
        '../bower/moment/min/moment.min.js',
        '../bower/sweetalert/dist/sweetalert.min.js',
        '../bower/medium-editor/dist/js/medium-editor.min.js',
        '../js/*.js'
    ], 'public/js/vendor.js');
});
