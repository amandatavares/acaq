<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Friendship;
use Illuminate\Support\Facades\DB;

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

    	return view('friendships.following')
    		->with('friends', $friendships)->with('not_friends',$not_friends);
    }
    public function show_questions($id)
    {
        $friend = User::find($id);
        $friendships = [];
        $friends = $friend->friendships;
        $users = User::all();
        foreach ($users as $key => $user) {
            foreach ($friends as $key => $f) {
                if($user->id == $f->id)
                    $friendships[] = $user;
            }
        }

        $users = User::all();
        $followers = [];
        foreach (Friendship::all() as $key => $f) {
            if($f->id == $friend->id)
                $followers[] = $f->user_id;
        }

    	return view('friendships.profile')
    		->with('friend', $friend)->with('friend_f', $friendships)->with('followers',$followers)->with('users',$users);
    }
    /*public function add_friend($id)
    {
        $friend = new Friendship;
        $friend->id = $id;
        $friend->user_id = Auth::user()->id;
        $friend->save();
        return redirect('allusers');
    }*/
    public function add_follower($id)
    {
        $friend = new Friendship;
        $friend->id = $id;
        $friend->user_id = Auth::user()->id;
        $friend->save();
        return redirect('followers');
    }

    public function add_follower_pesq($id)
    {
        $friend = new Friendship;
        $friend->id = $id;
        $friend->user_id = Auth::user()->id;
        $friend->save();
        return redirect('following');
    }
    public function add_follower_prof($id)
    {
        $friend = new Friendship;
        $friend->id = $id;
        $friend->user_id = Auth::user()->id;
        $friend->save();
        return redirect('profile');
    }
     public function add_follower_prof_user($id2, $id)
    {
        $friend = new Friendship;
        $friend->id = $id;
        $friend->user_id = Auth::user()->id;
        $friend->save();
        return redirect('profile/'.$id2);
    }

    



    public function followers(){
        $users = User::all();
        $followers = [];
        foreach (Friendship::all() as $key => $f) {
            if($f->id == Auth::user()->id)
                $followers[] = $f->user_id;
        }

        return view('friendships.followers')->with('followers',$followers)->with('users',$users);
    }

    public function unfollow($id)
    {
        $f = DB::delete('delete from friendships where friendships.id ='.$id.' and friendships.user_id ='.Auth::user()->id);
        return redirect('/profile');
    }

}
