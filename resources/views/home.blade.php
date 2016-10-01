@extends('layouts.app1')

@section('content')

<!--Post box-->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="box-post">
            <div class="box-post">
              <div class="box-title">
                <input type="text" placeholder="TÍTULO" name="name" class="input-title">
              </div>
              <div class="box-desc">
                <textarea name="name" placeholder="O que quer saber?" class="input-desc"></textarea>
              </div>
              <div class="box-footer ">
                <a  class="btn-post btn-max pull-right" href="#">
                  <img class="img-box" src="img/question.png" alt="" />
                </a>
                <a class="btn-post btn-min pull-right" href="#">
                  <img class="img-box" src="img/user.png" alt="" />
                  <!-- <input type="file" accept="image/*;capture=camera"> Esse comando é pra inserir a imagens, eu não consegui atribuir a imagem. Se conseguir, me diz <3 -->  
                </a>
                <a class="btn-post btn-min pull-right" href="#">
                  <img class="img-box" src="img/push-pin.png" alt="" />
                </a>
              </div>
            </div>
          </div>    
        </div>
      </div>
      </div>
      <!--/Post box-->  

<div class="container">
    <div class="row">
        <div class="dashb">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in, {{ Auth::user()->first_name }}!
                    <a href="{{ url('/perguntas') }}">Veja as perguntas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
