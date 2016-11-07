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

// Route::auth();

// Authentication Routes, uses LoginController
//Route::get('login', 'Auth\AuthController@showLoginForm'); // ????????+
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

// Registration Routes, uses RegisterController
//Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes, uses PasswordController
// **************** DOES NOT WORK
// Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
// Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
// Route::post('password/reset', 'Auth\PasswordController@reset');


Route::get('/', 'BlogpostController@show_all');

Route::post('blogposts', 'BlogpostController@store');
Route::get('blogposts/write', 'BlogpostController@write');
Route::get('blogposts/{id}/edit', 'BlogpostController@edit');
Route::get('blogposts/{id}', 'BlogpostController@show');
Route::patch('blogposts/{id}', 'BlogpostController@update');
Route::delete('blogposts/{id}', 'BlogpostController@destroy');


Route::get('controlpanel', function(){return view('admin');})->middleware('admin');




// ONLY FOR TESTING
Route::get('reset', function(){return view('/auth.passwords.reset');});
Route::get('request', function(){return view('/auth.passwords.request');});
// ONLY FOR TESTING

Route::get('/.well-known/acme-challenge/'.env('CERT_LINK_KEY'), 'CertificateController@lets_encrypt');

// facebook
Route::get('auth/facebook', 'Auth\AuthController@redirectToFacebookOAUTH');
Route::get('auth/facebook/callback', 'Auth\AuthController@facebookCallbackLogin');
