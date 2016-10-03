@extends('layouts.app1')

@section('content')
<script>

</script>
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
                    <a  class="btn-post btn-max pull-right" alt="Fazer pergunta" href="#">
                    {{ Form::submit('', array('class' => 'create-btn')) }}
                    </a>

                    <div>

                    <a class="btn-post btn-min pull-right" alt="Anexe uma foto" href="#">
                    {{ Form::file('img_path', array('class' => 'upload_img_btn')) }}
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
            @if ( $value->user_id === Auth::user()->id)
            <div class="dropdown dropdown-post pull-right">
                    <button class="btn-trans dropdown-toggle" type="button" data-toggle="dropdown">
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



              <div class="profile-pic-post pull-left">
                <a href="{{ url('profile/' . $value->user_id . '') }}">
                <img class="profile-post-pic" src="{{ $value->user_img }}"></a>
              </div>

              <div class="post-title-desc">
                <h4 class="title">{{ $value->title }}</h4>
                <h6 class="desc">{{ $value->description }}</h6>
              </div>

               @if ($value->img_path != NULL)
              <div class="thumbnail post-img">
                <img src="question_uploads/{{ $value->img_path }}" style="width:500px;height:auto;">
              </div>
              @endif

              <div class="post-footer">
                <script>
                  likes(<?= $value->id ?>);
                </script>

                <div>
                  <a class="pull-left likes" id="question-<?= $value->id ?>" data-toggle="modal" data-target="#modal-question-<?= $value->id?>"></a>

                  <div id="modal-question-<?= $value->id?>" style="margin-top:15% !important" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Curtidas</h4>
                      </div>
                      <div class="modal-body body-<?= $value->id?>">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

                  <button type="button" class="btn pull-left" onclick="like(<?=Auth::user()->id?>,<?=$value->id?>)">
                    <span class="glyphicon glyphicon-thumbs-up like" aria-hidden="true"></span>
                  </button>
                </div>

                <button type="button" class="btn pull-left">
                  <span class="glyphicon glyphicon-comment comment" aria-hidden="true"></span>
                </button>
                <!--<a class="btn-post btn-min pull-left" href="#">
                  <img class="img-box" src="img/push-pin.png" alt="">
                </a>-->
              </div>
            </div>
          </div>


          
        </div>
       </div>
      </div>
      @endforeach
          <!-- POST -->

@endsection
