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
                    {{ Form::submit('', array('class' => 'create-btn')) }} 
                    </a>

                    <div>

                    <a class="btn-post btn-min pull-right" href="#">
                    {{ Form::file('', array('class' => 'upload_img_btn')) }}
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

        <!-- POST -->
     @foreach($questions as $key => $value)
     <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="index-post">
            <div class="post-box">

            <!-- options new-->
            @if ( $value->user_id === Auth::user()->id)
            <div class="dropdown dropdown-post pull-right">
                    <button class="btn-trans dropdown-toggle" type="button" data-toggle="dropdown">
                        <!-- http://loremflickr.com/200/200/woman,profile -->
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu post-drop">
                        <li class="set-prof"><a href="{{ url('perguntas/' . $value->id) }}" class="set">Abrir pergunta</a></li>
                        <li class="set-prof"><a class="set" href="{{ url('perguntas/' . $value->id . '/edit') }}">Editar</a></li>
                        <li class="set-prof"><a class="set">
                            <form action="/perguntas/{{ $value->id }}" method="POST" style="float:left">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button>Apagar</button>
                            </form> 
                            </a></li>
                        <li class="set-prof"><a class="set" href="{{url('perguntas/answer/'.$value->id)}}">Responder</a></li>
                    </ul>
                </div>
              @endif
             <!-- Options 
             <div class=" dropdown options-post">
            <a class="dropdown-toggle options-post" href="#" data-toggle="dropdown" role="button" aria-expanded="true">
                Opções <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ url('perguntas/' . $value->id) }}"">
                        Abrir pergunta
                    </a>
                    <a href="{{ url('perguntas/' . $value->id . '/edit') }}">
                        Editar
                    </a>

                    <a>
                    <form action="/perguntas/{{ $value->id }}" method="POST" style="float:left">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button>Apagar</button>
                    </form> 
                    </a>

                    <a href="{{url('perguntas/answer/'.$value->id)}}">
                        Responder
                    </a>
                    
                </li>
            </ul>
            </div>
              Options -->

              <img class="profile-post-pic" src="{{ $value->user_img }}">
              <h4 class="title">{{ $value->title }}</h4>
              <h6 class="desc">{{ $value->description }}</h6>
              <div class="post-footer">
                <a class="btn-post btn-min pull-left" href="#">
                  <img class="img-box" src="/img/user.png" alt="" />
                </a>
                <a class="btn-post btn-min pull-left" href="#">
                  <img class="img-box" src="/img/push-pin.png" alt="" />
                </a>
              </div>


            </div>
          </div>
        </div>
       </div>
      </div>
      @endforeach
          <!-- POST --> 

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
