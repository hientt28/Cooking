const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

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

elixir(mix => {
    mix.styles('layout.css')
       .sass('app.scss')
       .webpack('app.js')
       .scripts('angularjs/app.js', 'public/angularjs/app.js')
       .scripts('angularjs/services/UserService.js', 'public/angularjs/services/UserService.js')
       .scripts('angularjs/controllers/ShowProfile.js', 'public/angularjs/controllers/ShowProfile.js')
       .scripts('angularjs/controllers/methodController.js', 'public/angularjs/controllers/methodController.js')
       .scripts('angularjs/controllers/EditProfile.js', 'public/angularjs/controllers/EditProfile.js');
});
