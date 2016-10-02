<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Illuminate\Support\Facades\Auth;

use App\Friendship;

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

        $friendships = [];
        $not_friends = [];
        $friends = $friend->friendships;
        $users = User::all();
        foreach ($users as $key => $user) {
            foreach ($friends as $key => $f) {
                if($user->id == $f->id){
                    $friendships[] = $user;
                }else{
                    $not_friends[] = $user;
                }
            }
        }

    	
    	return view('friendships.profile')
    		->with('friend', $friend)->with('friend_f', $friendships);;
    }
    public function add_friend($id)
    {
        $friend = new Friendship;
        $friend->id = $id;
        $friend->user_id = Auth::user()->id;
        $friend->save();
        return redirect('allusers');
    }

    public function follows(){
        $users = User::all();
        $follows = [];
        foreach (Friendship::all() as $key => $f) {
            if($f->id == Auth::user()->id)
                $follows[] = $f->user_id;
        }
        return view('follows')->with('follows',$follows)->with('users',$users);
    }
}
