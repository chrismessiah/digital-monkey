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

Route::get('/', 'BlogpostController@show_all');

// ONLY FOR TESTING
Route::get('/reset', function(){return view('/auth.passwords.reset');});
Route::get('/request', function(){return view('/auth.passwords.request');});
// ONLY FOR TESTING

Route::get('/login', function () {
  return view('login');
});

Route::get('/blogpost/{id}', 'BlogpostController@show_one');
Route::auth();
Route::get('/.well-known/acme-challenge/'.env('CERT_LINK_KEY'), 'CertificateController@lets_encrypt');
