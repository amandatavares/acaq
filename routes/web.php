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
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('auth/index');
});

Route::get('/login', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/following', 'FriendshipController@index');


Route::get('/followers', 'FriendshipController@followers');

Route::get('followers/{id}', 'FriendshipController@add_follower');
Route::get('pesquisa/followers/{id}', 'FriendshipController@add_follower_pesq');

Route::post('/profileimg', 'ProfileController@setPicProfile');

Route::get('/profile/{id}', 'FriendshipController@show_questions');

Route::get('/home', 'HomeController@index');
Route::get('/categories', 'CategoryController@index');
Route::get('/home', 'QuestionController@index');

Route::get('/laravel', 'LaravelController@index');

Route::get('/categorias', 'CategoryController@index');

Route::post('/pesquisa', function(Request $request){
	$users = App\User::all();
	$search = $request->search;
	return view('pesquisa')->with('users',$users)->with('search',$search);
});

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
Route::get('perfil', function(){
	return view('perfil');
});
// Curtidas
Route::post('doLike','LikesController@doLike');
Route::post('questionLikes','LikesController@questionLikes');
Route::post('user_like','LikesController@user_like');
