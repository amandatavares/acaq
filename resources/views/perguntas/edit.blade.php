<!-- app/views/nerds/edit.blade.php -->

@extends('layouts.app1')

@section('content')
    
<!--Post box-->
    <div class="container">

    <h2 class="t1">Editar pergunta</h2>

      <div class="row">
        <div class="col-md-12">
          <div class="box-post">
            <div class="box-post">
            {{ Form::model($question, ['url' => ['perguntas', $question->id], 'files' => true]) }}

            {{ csrf_field() }}
            {{ method_field('PUT') }}

                  <div class="box-title">
                    {{ Form::text('title', null, array('class' => 'input-title')) }}
                  </div>

                  <div class="box-desc">
                    {{ Form::textarea('description', null, array('class' => 'input-desc')) }}
                  </div>

                  <div class="box-footer ">
                    <a  class="btn-post btn-max pull-right" href="#">
                    {{ Form::submit('Edit the Question!', array('class' => 'img-box btn btn-primary')) }}
                      <img class="img-box" src="/img/question.png" alt=""/> 
                    </a>

                    <div>

                    <a class="btn-post btn-min pull-right" href="#">
                    {{ Form::file('img_path', array('class' => 'btn-post btn-min pull-right')) }}
                      <img class="img-box" src="/img/user.png" alt="" />
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

@endsection
