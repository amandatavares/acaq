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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/categorias', 'CategoryController@index');
Route::get('/perguntas', 'QuestionController@index');
Route::get('/perguntas/create', 'QuestionController@create');
Route::post('/perguntas', 'QuestionController@store');
// Route::post('/pergunta/ver', 'QuestionController@find');
// Route::post('/pergunta/{id}',['id'=>'QuestionController@editQuestion']);
Route::get('perguntas/{id}', 'QuestionController@show');
Route::get('perguntas/{id}/edit', 'QuestionController@edit');
Route::put('/perguntas', 'QuestionController@update');
