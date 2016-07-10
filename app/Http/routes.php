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


Route::group(['middleware' => ['web']], function(){



// Authentication Routes...
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');
Route::post('docregister', 'DoctorAuth\AuthController@register');
Route::post('register', 'Auth\AuthController@register');
Route::get('doclogin', 'DoctorAuth\AuthController@showLoginForm');
Route::post('doclogin', 'DoctorAuth\AuthController@login');
Route::get('doclogout', 'DoctorAuth\AuthController@logout');
Route::get('/home', 'HomeController@index');
Route::get('/profile', 'ProfileController@index');
Route::post('/patient/{name}/addlog', 'PatientController@appendLogs');

Route::post('/patient/{name}/addDisease', function(){return;});
Route::get('/patient/{name}/family', 'PatientController@familyIndex');
Route::get('/patient/{name}', 'PatientController@index');
Route::get('/patient_history', 'PatientController@getHistory');
Route::get('/current_patients', 'HomeController@index');
Route::get('/', 'HomeController@index');

Route::post('/patient/{name}/search', 'SearchController@index');

});


