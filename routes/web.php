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


Route::get('myfriends', 'FriendshipController@index');

Route::get('profile/{id}', 'FriendshipController@show_questions');

Route::get('/home', 'HomeController@index');
Route::get('/categories', 'CategoryController@index');
Route::get('/home', 'QuestionController@index');

Route::get('/laravel', 'LaravelController@index');

Route::get('/categorias', 'CategoryController@index');


Route::get('/profile', 'ProfileController@index');

//Jonas's routes
Route::get('add_user/{id}', 'FriendshipController@add_friend');

Route::get('perguntas/myquestions', 'QuestionController@myquestions');

Route::get('perguntas/answer/{id}', 'AnswerController@answer_create');
Route::post('perguntas/answer/{id}', 'AnswerController@answer_store');
Route::resource("perguntas","QuestionController");
Route::resource("answers","AnswerController");
Route::resource("comments","CommentController");

// Create dashboard route
Route::resource('dashboard', 'DashboardController@getIndex');

Route::get('allusers', function(){
	$users = App\User::all();
	return view('allusers')->with('users',$users);
});



