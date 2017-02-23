<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('api/users', 'UserController', ['except' => 'edit']);

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/register/verify/{confirmationCode}', 'Auth\RegisterController@confirm');
