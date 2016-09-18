<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question as Question;

class QuestionController extends Controller
{
    //
    function index(){
      // Liste todos os filmes e os retorne no Index
      $question = Question::all();
      return view('home/index',['questions'=>$question]);
    }

    function makeQuestion(Request $request)
    {
      // $input = $request->all();
      // return Question::create($input);
      $q =  new Question();
      $q->title = $request->title;
      $q->description = $request->description;

      return $q->save();
    }
}
