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

// Authentication Routes, uses AuthController
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes, uses AuthController
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');

// Password Reset Routes, uses PasswordController
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');



Route::get('/', 'BlogpostController@show_all');

Route::post('blogposts', 'BlogpostController@store');
Route::get('blogposts/create', 'BlogpostController@create');
Route::get('blogposts/{id}/edit', 'BlogpostController@create');
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
