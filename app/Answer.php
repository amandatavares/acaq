<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    public function ask() {
  	   // retorna uma lista de dados relacionados; funciona como o where id do DB
      	return $this->belongsTo('App\Question','questions_id'); //tabela,chave estrangeira da segunda tabela
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function comment() {
        return $this->hasMany('App\Comment');
    }
}
