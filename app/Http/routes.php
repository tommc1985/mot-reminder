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



Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// Authentication routes...
Route::get('auth/login', ['as' => 'auth.login', 'uses' =>'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' =>'Auth\AuthController@getLogout']);


Route::get('/', ['as' => 'dashboard', 'uses' =>'Dashboard@index']);
Route::resource('mots', 'Mot');
Route::resource('reminders', 'Reminder');