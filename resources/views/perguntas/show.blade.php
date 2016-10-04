
@extends('layouts.app1')

@section('content')

  @foreach($users as $user)
    @if($question->user_id === $user->id)
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="index-post">
              <div class="post-box">
                @if ( $question->user_id === Auth::user()->id)
                  <div class="dropdown dropdown-post pull-right">
                      <button class="btn-trans dropdown-toggle" type="button" data-toggle="dropdown">
                          <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu post-drop">
                          <li class="set-prof"><a class="set" href="{{ url('perguntas/' . $question->id . '/edit') }}">Editar</a></li>
                          <li class="set-prof"><a class="set" href="{{url('perguntas/delete/'.$question->id)}}">Apagar</a></li>

                      </ul>
                  </div>
                @endif
                <div class="profile-pic-post pull-left">
                  <a href="{{ url('profile/' . $question->user_id . '') }}">
                    <img class="profile-post-pic" src="{{ $user->img_profile }}">
                  </a>
                </div>

                <div class="post-title-desc">
                  <h4 class="title">{{ $question->title }}</h4>
                  <h6 class="desc">{{ $question->description }}</h6>
                </div>

                <!--Foto da pergunta-->
                @if ($question->img_path != NULL)
                  <div class="thumbnail post-img">
                    <img src="/question_uploads/{{ $question->img_path }}" style="width:500px;height:auto;">
                  </div>
                @endif

                <div class="post-footer">
                  <script>
                    likes(<?= $question->id ?>);
                  </script>
                    <div class="row">
                      <a class="pull-left likes" id="question-<?= $question->id ?>" data-toggle="modal" data-target="#modal-question-<?= $question->id?>"></a>

                      <div id="modal-question-<?= $question->id?>" style="margin-top:15% !important" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Curtidas</h4>
                            </div>
                            <div class="modal-body body-<?= $question->id?>"></div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <button type="button" class="btn pull-left" onclick="like(<?=Auth::user()->id?>,<?=$question->id?>)">
                        <span class="glyphicon glyphicon-thumbs-up like" aria-hidden="true"></span>
                      </button>


                      <button type="button" class="btn pull-left comm-btn" onclick="showComment('#comment-<?=$question->id?>')">
                        <span class="glyphicon glyphicon-comment comment" aria-hidden="true"></span>
                      </button>
                    </div>
                  <div class="hideable hidden" id="comment-<?=$question->id?>">
                    <div class="row">
                    {{ Form::open(['url' => ['perguntas/answer',$question->id], 'files' => true]) }}

                          {{ Form::text('description', old('description'), array('class' => 'form-control answer-input', 'placeholder'=>'Digite sua resposta')) }}

                      <!-- {{ Form::submit('OK', array('class' => 'btn btn-primary')) }} -->
                    {{ Form::close() }}
                    </div>
                    <h3 class="title-resp">Respostas</h3>
                    @foreach($answers as $key => $answers)
                      <p class="desc"><strong>{{$answers->user->first_name}} : </strong>{{$answers->description}}</p>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
  @endforeach
@endsection
