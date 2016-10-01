@extends('layouts.app1')

@section('content')

<!--Post box-->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="box-post">
            <div class="box-post">
            {{ Form::open(array('url' => 'perguntas', 'files' => true)) }}
                  <div class="box-title">
                    {{ Form::text('title', old('title'), array('class' => 'input-title', 'placeholder' => 'TÍTULO')) }}
                  </div>

                  <div class="box-desc">
                    {{ Form::textarea('description', old('description'), array('class' => 'input-desc', 'placeholder' => 'O que quer saber?')) }}
                  </div>

                  <div class="box-footer ">
                    <a  class="btn-post btn-max pull-right" href="#">
                    {{ Form::submit('Create the Question!', array('class' => 'img-box')) }}
                      <img class="img-box" src="img/question.png" alt=""/> 
                    </a>

                    <div>

                    <a class="btn-post btn-min pull-right" href="#">
                    {{ Form::file('img_path', array('class' => 'btn-post btn-min pull-right')) }}
                      <img class="img-box" src="img/user.png" alt="" />
                    </a>
                    </div>
            {{ Form::close() }}

                    <!-- BOTAO DE ANEXO (N ENTENDI PRA QUE SERVE)
                    <a class="btn-post btn-min pull-right" href="#">
                      <img class="img-box" src="img/push-pin.png" alt="" />
                    </a> -->

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
                    Você está logado, {{ Auth::user()->first_name }}!
                    <a href="{{ url('/perguntas') }}">Veja as perguntas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
