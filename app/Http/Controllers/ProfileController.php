<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use App\Question as Question;
use Illuminate\Support\Facades\Auth;
use Html;

class ProfileController extends Controller
{
    //
    function index(){

       $friendships = [];
      $not_friends = [];
      $friends = Auth::user()->friendships;
      $users = User::all();
      foreach ($users as $key => $user) {
        foreach ($friends as $key => $friend) {
          if($user->id == $friend->id){
            $friendships[] = $user;
          }else{
            $not_friends[] = $user;
          }
        }
      }

      // Liste todos os filmes e os retorne no Index
      $question = Question::all();
      return view('profile')
            ->with('questions', $question)->with('friends', $friendships);
      // return view('home/index',['questions'=>$question]);
    }
    function create()
    {
        // load the create form (app/views/perguntas/create.blade.php)
        return view('profile');
    }

    public function show($id)
    {
        // get the question
        $question = Question::find($id);
        $answers = $question->answers;

        // show the view and pass the nerd to it
        return view('perguntas.show')
            ->with('question', $question)->with('answers',$answers);
    }
    
    public function myquestions(){
      $user = Auth::user();
      $questions = $user->questions;
      return view('profile')->with('questions', $questions);
    }

}

