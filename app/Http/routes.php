<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['web']], function(){



// Authentication Routes...
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::post('docregister', 'DoctorAuth\AuthController@register');
Route::post('register', 'Auth\AuthController@register');

Route::get('doclogin', 'DoctorAuth\AuthController@showLoginForm');
Route::post('doclogin', 'DoctorAuth\AuthController@login');
Route::get('doclogout', 'DoctorAuth\AuthController@logout');

});

