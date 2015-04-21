var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less', 'resources/css')
       .styles([
         'app.css'
       ])
       .scripts([
        'angularjs/angular.min.js',
        'ng-ckeditor/ng-ckeditor.min.js',
        'jquery/dist/jquery.min.js',
        'bootstrap/dist/js/bootstrap.min.js',
    ], 'public/js/all.js', 'resources/js/bower_components')
        .styles([
           'bootstrap/dist/css/bootstrap.min.css',
           'metisMenu/dist/metisMenu.min.css',
           'font-awesome/css/font-awesome.min.css',
           'startbootstrap-sb-admin-2/dist/css/timeline.css',
           'startbootstrap-sb-admin-2/dist/css/sb-admin-2.css',
        ],'public/css/admin.css', 'resources/js/bower_components')
        .scripts([
            'angularjs/angular.min.js',
            'jquery/dist/jquery.min.js',
            'bootstrap/dist/js/bootstrap.min.js',
            'metisMenu/dist/metisMenu.min.js',
            'raphael/raphael-min.js',
            'morrisjs/morris.min.js',
            'startbootstrap-sb-admin-2/dist/js/sb-admin-2.js'
        ], 'public/js/admin.js', 'resources/js/bower_components')
        .copy('resources/js/bower_components/font-awesome/fonts/', 'public/fonts')
        //frontend
        .scripts([
            'js/bower_components/angularjs/angular.min.js',
            'frontend/js/jquery.js',
            'frontend/js/hoverIntent.js',
            'frontend/js/jquery_slie.js',
            'frontend/js/scrolling-nav.js',
            'frontend/js/soliloquy_slie.js',
        ], 'public/js/frontend.js', 'resources')
        .styles([
            'docked-nav.css',
            'slie-pic.css',
            'bootstrap.min.css',
            'scrolling-nav.css',
            'soliloquy.css',
            'style_002.css',

        ],  'public/css/frontend.css', 'resources/frontend/css')
        .copy('resources/frontend/fonts/', 'public/fonts');

});
