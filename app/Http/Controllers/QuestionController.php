<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Question as Question;
// use Illuminate\Support\Facades\Input as Input;
// use Illuminate\Support\Facades\View as View;
// use Illuminate\Support\Facades\Validator as Validator;
// use Illuminate\Html\HtmlFacade as Html;
use Html;

class QuestionController extends Controller
{
    //
    function index(){
      // Liste todos os filmes e os retorne no Index
      $question = Question::all();
      return view('perguntas.index')
            ->with('questions', $question);
      // return view('home/index',['questions'=>$question]);
    }
    function create()
    {
        // load the create form (app/views/perguntas/create.blade.php)
        return view('perguntas.create');
    }

    function store(Request $request)
    {
      // $input = $request->all();
      // return Question::create($input);
      $rules = array(
            'title'       => 'required|max:255',
            'description'      => 'required'
      );
      $validator = $this->validate($request, $rules);

      // process the login
      // store
      $q =  new Question();
      $q->title = $request->title;
      $q->description = $request->description;
      $q->user_id = $request->user()->id;
      //$q->categories_id = 1;
      /*if (isset($request->img_path) && trim($request->img_path) != "") {
        // checking file is valid.
        if ($request->hasFile('img_path') && $request->img_path->isValid()) {
          $destinationPath = 'question_uploads/'; // upload path
          $extension = $request->img_path->getClientOriginalExtension(); // getting image extension
          $fileName = md5(time()."img").'.'.$extension; // renameing image
          $q->img_path = $fileName;
          $request->img_path->move($destinationPath, $fileName); // uploading file to given path
          // sending back with message
          // Session::flash('success', 'Upload successfully');
        }
      }*/
      $q->save();

      // redirect
      session()->flash('message', 'Successfully created question!');
      return redirect('perguntas');
    }
    public function show($id)
    {
        // get the question
        $questions = Question::find($id);
        $answers = $questions->answers;

        // show the view and pass the nerd to it
        return view('perguntas.show')
            ->with('question', $questions)->with('answers',$answers);
    }
    public function edit($id)
    {
        // get the nerd
        $questions = Question::find($id);

        // show the edit form and pass the nerd
        return view('perguntas.edit')
            ->with('question', $questions);
    }
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http: //laravel.com/docs/validation
        //$rules = array(
        //      'title'       => 'required|max:255',
        //      'description'      => 'required'
        //);
        //$validator = validate($request, $rules);

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
    public function delete(Request $request, $id)
    { 
        Question::findOrFail($id)->delete();
        session()->flash('message', 'Successfully deleted question!');
        return redirect('/perguntas');
    }
    public function comment(Request $request, $id){

    }
}
