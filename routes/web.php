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
Route::get('perguntas/myquestions', 'QuestionController@myquestions');
Route::get('perguntas/answer/{id}', 'AnswerController@answer_create');
Route::post('perguntas/answer/{id}', 'AnswerController@answer_store');
Route::resource("perguntas","QuestionController");
Route::resource("answers","AnswerController");
Route::resource("comments","CommentController");
// Create dashboard route
Route::resource('dashboard', 'DashboardController@getIndex');
