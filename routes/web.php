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

//ACAQ
//Questions
Route::resource("perguntas","QuestionController");
Route::get('/perguntas/myquestions', 'QuestionController@myquestions');
Route::get('/home', 'QuestionController@index');
Route::get('/perguntas/delete/{id}', 'QuestionController@delete');
//Answers
Route::get('/perguntas/answer/{id}', 'AnswerController@answer_create');
Route::post('/perguntas/answer/{id}', 'AnswerController@answer_store');
//Friendships
Route::get('/following', 'FriendshipController@index');
Route::get('/following/{id}/remove', 'FriendshipController@unfollow');
Route::get('/followers', 'FriendshipController@followers');
Route::get('/followers/{id}', 'FriendshipController@add_follower');
Route::get('/pesquisa/followers/{id}', 'FriendshipController@add_follower_pesq');
Route::get('/add_user/{id}', 'FriendshipController@add_friend');
//Categorie
Route::get('/categorias', 'CategoryController@index');
//Profiles
Route::post('/profileimg', 'ProfileController@setPicProfile');
Route::get('/profile', 'ProfileController@index');
Route::get('/profile/{id}', 'FriendshipController@show_questions');

//Others
Route::post('/pesquisa', function(Request $request){
	$users = App\User::all();
	$search = $request->search;
	return view('pesquisa')->with('users',$users)->with('search',$search);
});

Route::get('perfil', function(){
	return view('perfil');
});

// Curtidas
Route::post('doLike','LikesController@doLike');
Route::post('questionLikes','LikesController@questionLikes');
Route::post('user_like','LikesController@user_like');

//Testes Laravel
Route::get('/laravel', 'LaravelController@index');
Route::get('allusers', function(){
	$users = App\User::all();
	return view('allusers')->with('users',$users);
});

//Not_used
Route::resource("answers","AnswerController");
Route::resource("comments","CommentController");
Route::resource('dashboard', 'DashboardController@getIndex');
