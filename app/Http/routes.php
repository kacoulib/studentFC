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

/*Route::get('/', function () {
    return view('home'); // return envoi une réponse au client
});*/

Route::get('/', 'FrontController@index');

Route::get('student', 'FrontController@showAll');

Route::get('student/{id}', 'FrontController@showStudent');

Route::get('bio', 'FrontController@bio');