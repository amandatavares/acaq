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
    return view('auth/login');
});

// Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/categorias', 'CategoryController@index');
Route::get('/perguntas', 'QuestionController@index');
Route::post('/nova', 'QuestionController@makeQuestion');
