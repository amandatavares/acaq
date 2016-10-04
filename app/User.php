<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Auth\UserTrait;
// use Illuminate\Auth\UserInterface;
// use Illuminate\Auth\Reminders\RemindableTrait;
// use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Authenticatable
{
    // Eloquent
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password'];

    protected $table = 'users';


    protected $hidden = array('password', 'remember_token');

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function isFriend($id)
    {
        $friends = Auth::user()->friendships;
        foreach ($friends as $key => $friend) {
            if($friend->id == $id){
                return TRUE;
            }
        }
        return FALSE;
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }
    public function friendships(){
        return $this->hasMany('App\Friendship');
    }

}
