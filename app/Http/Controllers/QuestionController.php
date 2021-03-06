<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Question as Question;
use Illuminate\Support\Facades\Auth;
use Html;

class QuestionController extends Controller
{
    //
    function index(){
      // Liste todos os filmes e os retorne no Index

      $question = Question::orderBy('id','desc')->get();

      $users = User::all();

      return view('home')
            ->with('questions', $question)->with('users', $users);
      // return view('home/index',['questions'=>$question]);
    }
    function create()
    {
        // load the create form (app/views/perguntas/create.blade.php)
        return view('perguntas.create');
    }

    function store(Request $request)
    {
      $this->validate($request, array(
            'title'       => 'required|max:255',
            'category_id' => 'required'
      ));


      // process the login
      // store
      $q =  new Question();
      $q->title = $request->title;
      $q->description = $request->description;
      $q->user_id = $request->user()->id;
      $q->user_img = $request->user()->img_profile;
      $q->category_id = $request->category_id;

      if (isset($request->img_path) && trim($request->img_path) != "") {
        // checking file is valid.
        if ($request->hasFile('img_path') && $request->img_path->isValid()) {
          $destinationPath = 'question_uploads/'; // upload path
          $extension = $request->img_path->getClientOriginalExtension(); // getting image extension
          $fileName = md5(time()."img").'.'.$extension; // renameing image
          $q->img_path = $fileName;
          $request->img_path->move($destinationPath, $fileName); // uploading file to given path
          //sending back with message
          // Session::flash('success', 'Upload successfully');
        }
      }
      $q->save();

      // redirect
      session()->flash('message', 'Successfully created question!');
      return redirect('home');
    }

    public function show($id)
    {
        // get the question
        $question = Question::orderBy('id','desc')->find($id);
;
        $answers = $question->answers;
        $users = User::all();

        // show the view and pass the nerd to it
        return view('perguntas.show')
            ->with('question', $question)->with('answers',$answers)->with('users',$users);
    }

  /*public function show($id)
    {
        // get the question
        $question = Question::find($id);
        $answers = $question->answers;

        // show the view and pass the nerd to it
        return view('perguntas.show')
            ->with('question', $question)->with('answers',$answers);
    }*/

    public function edit($id)
    {
        // get the nerd
        $question = Question::find($id);

        // show the edit form and pass the nerd
        return view('perguntas.edit')
            ->with('question', $question);
    }
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http: //laravel.com/docs/validation
        $this->validate($request, array(

            'title'       => 'required|max:255'//,
            //'description'      => 'required'
        ));

        // process the login
        // store
        $questions = Question::find($id);
        $questions->title = $request->input('title');
        $questions->description  = $request->input('description');
        $questions->img_path = $request->input('img_path');
        $questions->save();

        // redirect
        session()->flash('message', 'Successfully updated question!');
        return redirect('perguntas');
    }
    public function destroy(Request $request, $id)
    {
        Question::findOrFail($id)->delete();
        session()->flash('message', 'Successfully deleted question!');
        return redirect('/perguntas');
    }
    public function delete($id)
    {
        Question::findOrFail($id)->delete();
        return redirect('/home');
    }
    public function delete_pergunta_profile($id){
        Question::findOrFail($id)->delete();
        return redirect('/profile');
    }
    public function myquestions(){
      $user = Auth::user();
      $questions = $user->questions;
      return view('profile')->with('questions', $questions);
    }
}
