<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use App\Friendship;
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
      $count_followings = 0;
      foreach ($users as $key => $user) {
        foreach ($friends as $key => $friend) {
          if($user->id == $friend->id){
            $friendships[] = $user;
            $count_followings+=1;
          }
        }
      }
      $count_followers=0;
      $followers = [];
      foreach (Friendship::all() as $key => $f) {
          if($f->id == Auth::user()->id){
              $followers[] = $f->user_id;
              $count_followers+=1;
          }
      }

      $question = Question::all();
      return view('profile')
            ->with('questions', $question)->with('friends', $friendships)->with('followers',$followers)->with('users',$users)->with('count_followers',$count_followers)->with('count_followings',$count_followings);
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

    public function config(Request $request){

      $me =  Auth::user();
      $me->first_name = $request->first_name;
      $me->last_name = $request->last_name;

      if (isset($request->img_profile_path) && trim($request->img_profile_path) != "") {
        // checking file is valid.
        if ($request->hasFile('img_profile_path') && $request->img_profile_path->isValid()) {
          $destinationPath = 'profile_pic_uploads/'; // upload path
          $extension = $request->img_profile_path->getClientOriginalExtension(); // getting image extension
          $fileName = md5(time()."img").'.'.$extension; // renameing image
          Auth::user()->img_profile = '/profile_pic_uploads/'.$fileName;
          $request->img_profile_path->move($destinationPath, $fileName); // uploading file to given path
          //sending back with message
        }
      }
      
      $me->save();
      return redirect('home');
    }

    public function config_view(){

      return view('config');
    }




    //upload a image profile
    public function setPicProfile(Request $request){

      if (isset($request->img_profile_path) && trim($request->img_profile_path) != "") {
        // checking file is valid.
        if ($request->hasFile('img_profile_path') && $request->img_profile_path->isValid()) {
          $destinationPath = 'profile_pic_uploads/'; // upload path
          $extension = $request->img_profile_path->getClientOriginalExtension(); // getting image extension
          $fileName = md5(time()."img").'.'.$extension; // renameing image
          Auth::user()->img_profile = '/profile_pic_uploads/'.$fileName;
          $request->img_profile_path->move($destinationPath, $fileName); // uploading file to given path
          //sending back with message
        }
      }
      Auth::user()->save();
      return redirect('home');
    }

}

