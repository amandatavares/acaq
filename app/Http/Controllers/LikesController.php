<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Likes as Likes;
use App\User as User;
class LikesController extends Controller
{
    //
    public function doLike(Request $req){
      $like = new Likes();
      $like->user_id = $req->user_id;
      $like->questions_id = $req->questions_id;
      if(Likes::where(["questions_id"=>$req->questions_id],["user_id"=>$req->user_id])->count()>=1){
        Likes::where(["questions_id"=>$req->questions_id],["user_id"=>$req->user_id])->delete();
      }else{
        if ($like->save()) {
          return "true";
        }else {
          return "false";
        }
      }
    }
    public function questionLikes(Request $req){
      header('Content-type: application/json');
      $q = Likes::where("questions_id",$req->questions_id);
      $qtd = $q->get();
      $res = array('qtd'=>$qtd->count(),'user'=>$q->get());
      return $res;
    }
    public function user_like(Request $req){
      return User::find($req->id);
    }
}
