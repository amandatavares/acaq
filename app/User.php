<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
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

    public function friends()
    {
        return $this->belongsToMany('User', 'friends_users', 'user_id', 'friend_id');
    }

    public function addFriend(User $user)
    {
        $this->friends()->attach($user->id);
    }

    public function removeFriend(User $user)
    {
        $this->friends()->detach($user->id);
    }

    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
<<<<<<<< HEAD
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }
=======
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
>>>>>>> d948daa0971955a0dee6d2552e30b211455f8f12
}
