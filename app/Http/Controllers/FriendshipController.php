<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller
{
    public function index()
    {
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

    	return view('friendships.index')
    		->with('friends', $friendships)->with('not_friends',$not_friends);
    }
    public function show_questions($id)
    {
    	$friend = User::find($id);
    	return view('friendships.show_questions')
    		->with('friend', $friend);
    }
}
