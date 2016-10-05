@extends('layouts.app1')

@section('content')

<!--Profile-->
    <div id="container-profile">

    <div class="profile-box">
        <div class="cover-pic">
            <img class="cover" src="/img/cover.png">
            <img class="profile-pic" src="{{ Auth::user()->img_profile }}">
            <a href="{{ url('/profile') }}">
                <h1 class="name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>
            </a>
        </div>

     @foreach($questions as $key => $value)
          @if($value->user_id === Auth::user()->id)
              <div class="col-md-12">
                  <div class="publication-box">
                    
                      <div class="dropdown dropdown-post pull-right">
                        <button class="btn-trans dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu post-drop">
                            <li class="set-prof">
                              <a class="set" href="{{ url('perguntas/' . $value->id . '/edit') }}">Editar</a>
                            </li>
                            <li class="set-prof">
                              <a class="set" href="{{url('profile/perguntas/delete/'.$value->id)}}">Apagar</a>
                            </li>

                        </ul>
                      </div>
                    
                    <div class="profile-pic-post pull-left">
                      <a href="{{ url('profile/' . $value->user_id . '') }}">
                        <img class="profile-post-pic" src="{{ Auth::user()->img_profile }}">
                      </a>                  

                        </ul>

                    </div>

                    <div class="post-title-desc">
                      <a href="{{ url('perguntas/' . $value->id) }}"><h4 class="title">{{ $value->title }}</h4></a>
                      <h6 class="desc">{{ $value->description }}</h6>
                    </div>

                    @if ($value->img_path != NULL)
                      <div class="thumbnail post-img">
                        <img src="/question_uploads/{{ $value->img_path }}" style="width:500px;height:auto;">
                      </div>
                    @endif

                    <div class="post-footer" style="background-color: #dad5d7" >
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
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <button type="button" class="btn pull-left" onclick="like(<?=Auth::user()->id?>,<?=$value->id?>)">
                          <span class="glyphicon glyphicon-thumbs-up like" aria-hidden="true"></span>
                        </button>
                      </div>

                      <button type="button" class="btn pull-left" onclick="showComment('#comment-<?=$value->id?>')">
                        <span class="glyphicon glyphicon-comment comment" aria-hidden="true"></span>
                      </button>
                      <!--<a class="btn-post btn-min pull-left" href="#">
                        <img class="img-box" src="img/push-pin.png" alt="">
                      </a>-->


                      {{ Form::open(['url' => ['perguntas/answer',$value->id], 'files' => true]) }}

                          {{ Form::text('description', old('description'), array('class' => 'form-control answer-input', 'placeholder'=>'Digite sua resposta', 'style' => 'width: 590px;')) }}

                          <!-- {{ Form::submit('OK', array('class' => 'btn btn-primary')) }} -->
                        {{ Form::close() }}

                    </div>

                    <!-- inicio respostas-->
                   <div class="hideable hidden" id="comment-<?=$value->id?>" style="background: #e4dfe1;" >
                    <div class="row">

                    <div class="col-sm-12" style="margin-bottom: 10px;" >
                      <h3 class="title-resp">Respostas</h3>
                      @foreach($value->answers as $key => $answers)

                           @if ( $answers->user_id === Auth::user()->id )
                            <div class="dropdown dropdown-post pull-right">
                              <button class="btn-trans dropdown-toggle" type="button" data-toggle="dropdown" style="margin-right: 10px;">
                                  <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu post-drop">
                                  <li class="set-prof">
                                    <a class="set" href="SUA URL AQUIIIIII">Apagar</a>
                                  </li>
                              </ul>
                            </div>
                          @endif

                        <div class="answer-box">
                          <div class="profile-pic-post pull-left">
                            <a href="/profile/<?=$answers->user->id?>">
                              <img class="profile-post-pic profile-answer-pic" src="<?=$answers->user->img_profile?>">
                            </a>                  
                          </div>

                          <a href="/profile/<?=$answers->user->id?>" class="answer-name">{{$answers->user->first_name}} {{ $answers->user->last_name}}</a>

                          <p class="answer-desc"> {{$answers->description}}</p>
                        </div>

                      @endforeach
                    </div>
                  </div>
                </div>
                <!-- fim das respostas-->


                  </div>
                </div>

          @endif
      @endforeach

    </div>

   <div id="follow-box">
    <div class="following-box">
        <div >
            <h5 class="friends-title">SEGUINDO ( {{ $count_followings }} )</h5>
        </div>
        @if( $friends === [] )
            <div class="friends">
                <h4>Você está seguindo ninguém</h4>
                <h4>Procure um amigo!</h4>
            </div>
        @endif
        
        @foreach ($friends as $key => $val)
        <div class="friends">
            <a href="{{ url('profile/' . $val->id . '') }}">
                <img class="profile-friend-pic" src="{{ $val->img_profile }}">
            </a>

            <a href="{{ url('profile/' . $val->id . '') }}">
                <h5>{{ $val->first_name }}</h5>
            </a>

            <h6>{{ $val->email }}</h6>
            <a href="{{ url('/following/'.$val->id.'/remove') }}" title="Deixar de seguir"><h6 id="seguir">-</h6></a>
        </div>
        @endforeach
    </div>

    <div class="followers-box">
        <div >
            <h5 class="friends-title">SEGUIDORES ( {{ $count_followers }} )</h5>
        </div>
        @if( $followers === [] )
            <div class="friends">
                <h4>Você não possui seguidores</h4>
            </div>
        @endif
        
         @foreach($followers as $f)
            @foreach($users as $user)
                @if($f == $user->id)
                    <div class="friends">

                        <a href="{{ url('profile/' . $user->id . '') }}">
                            <img class="profile-friend-pic" src="{{ $user->img_profile }}">
                        </a>

                        <a href="{{ url('profile/' . $user->id . '') }}">
                            <h5>{{ $user->first_name }}</h5>
                        </a>

                        <h6>{{ $user->email }}</h6>

                        @if (Auth::user()->isFriend($f)==FALSE)
                            <a href="{{ url('profile/followers/'.$f) }}" title="Seguir"><h6 id="seguir">+</h6></a>
                        @endif
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
    </div>

    </div>

@endsection
