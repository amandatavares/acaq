<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Likes as Likes;
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
      $qtd = Likes::where("questions_id",$req->questions_id)->get();
      $res = array('qtd'=>$qtd->count(),'other'=>$qtd);
      return $res;
    }
}
