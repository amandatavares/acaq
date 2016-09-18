<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function answer() {
  	   // retorna uma lista de dados relacionados; funciona como o where id do DB
      return $this->belongsTo('App\Answer','answers_id'); //tabela,chave estrangeira da segunda tabela
    }
}
