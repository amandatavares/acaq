<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    public function users(){
    	return $this->belongsTo('App\User');
    }
}
