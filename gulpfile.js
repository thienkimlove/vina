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
            'frontend/js/jquery-1.10.2.min.js',
            'frontend/js/owl.carousel.min.js',
            'frontend/js/floating-navigation.js',
            'frontend/js/common.js'
        ], 'public/js/frontend.js', 'resources')
        .styles([
            'style.css'
        ], 'public/css/frontend.css', 'resources/frontend/css')
        .copy('resources/frontend/fonts/', 'public/fonts');

});
