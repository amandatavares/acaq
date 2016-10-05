@extends('layouts.app1')

@section('content')

<!--Profile-->
    <div class="profile-box">
        <div class="cover-pic">
            <img class="cover" src="/img/cover.png">
            <img class="profile-pic" src="{{ $friend->img_profile }}">
            <h1 class="name">{{ $friend->first_name }} {{ $friend->last_name }}</h1>
        </div>
        @if(Auth::user()->isFriend($friend->id)==false)
            <a class="botao1" href="{{ url('profile_user/'.$friend->id.'/followers/'.$friend->id) }}">SEGUIR+</a>
        @else
            <a class="botao1" href="{{ url('profile_user/'.$friend->id.'/followers/'.$friend->id.'/remove') }}">DEIXAR DE SEGUIR</a>
        @endif

        @foreach($friend->questions as $value)
          @if($value->user_id === $friend->id)
              <div class="col-md-12">
                  <div class="publication-box">
                                       
                    <div class="profile-pic-post pull-left">
                      <a href="{{ url('profile/'.$friend->img_profile)}}">
                        <img class="profile-post-pic" src="{{ $friend->img_profile }}">
                      </a>                  
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


                      {{ Form::open(['url' => ['perguntas/answer',$value->id], 'files' => true]) }}

                          {{ Form::text('description', old('description'), array('class' => 'form-control answer-input', 'placeholder'=>'Digite sua resposta', 'style' => 'width: 590px;')) }}

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


        <!-- PERGUNTAS ANTIGO
        @foreach ($friend->questions as $q)
            @if ( $q->user_id === $friend->id)
                <div class="publication-box">
                    <img class="profile-post-pic-my" src="{{ $friend->img_profile }}">
                    <div class="post">
                        <a href="{{ url('perguntas/' . $q->id) }}">
                            <p class="title-my">{{ $q->title }}</p>
                        </a>
                        <p class="desc-my">{{ $q->description }}</p>


                        
                    </div>
                </div>
            @endif
        @endforeach
        -->

    </div>

    <div>
        <div class="following-box">
        	<div>
                <h5 class="friends-title">SEGUINDO ( {{ $count_followings }} )</h5>                
            </div>
            @if( $friend_f === [] )
                <div class="friends">
                    <h4>Está seguindo ninguém</h4>
                </div>
            @endif
            
            @foreach ($friend_f as $key => $val)
                <div class="friends">

                    <a href="{{ url('profile/' . $val->id) }}">
                        <img class="profile-friend-pic" src="{{ $val->img_profile }}">
                    </a>

                    <a href="{{ url('profile/' . $val->id) }}">
                        <h5>{{ $val->first_name }}</h5>
                    </a>
                    <h6>{{ $val->email }}</h6>
                    @if (Auth::user()->isFriend($val->id)==FALSE and Auth::user()->id != $val->id)
                        <a href="{{ url('profile_user/'.$friend->id.'/followers/'.$val->id) }}"><h6 id="seguir">+</h6></a>
                    @endif
                </div>

            @endforeach
        </div>

        <div class="followers-box">
            <div >
                <h5 class="friends-title">SEGUIDORES ( {{ $count_followers }} )</h5>
            </div>
            
            @foreach($followers as $f)
                @foreach($users as $user)
                    @if($f == $user->id)
                        <div class="friends">
                            
                            <a href="{{ url('profile/' . $user->id) }}">
                                <img class="profile-friend-pic" src="{{ $user->img_profile }}">
                            </a>

                            <a href="{{ url('profile/' . $user->id) }}">
                                <h5>{{ $user->first_name }}</h5>
                            </a>

                            <h6>{{ $user->email }}</h6>
                            @if (Auth::user()->isFriend($user->id)==FALSE and Auth::user()->id != $user->id)
                                <a href="{{ url('profile_user/'.$friend->id.'/followers/'.$user->id) }}" title="Seguir"><h6 id="seguir">+</h6></a>
                            @endif
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>





@endsection
