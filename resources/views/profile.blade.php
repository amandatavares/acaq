@extends('layouts.app1')

@section('content')

<!--Profile-->
    <div class="profile-box">
        <div class="cover-pic">
            <img class="cover" src="/img/cover.png">
            <img class="profile-pic" src="{{ Auth::user()->img_profile }}">
            <a href="{{ url('/profile') }}">
                <h1 class="name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>
            </a>
        </div>

        @foreach ($questions as $key => $value)
            @if ( $value->user_id === Auth::user()->id)
                <div class="publication-box">

                    <div class="dropdown dropdown-post-my pull-right">
                        <button class="btn-trans dropdown-toggle" type="button" data-toggle="dropdown">
                            <!-- http://loremflickr.com/200/200/woman,profile -->
                            <span class="caret"></span>
                        </button>

                        <ul class="dropdown-menu post-drop">
                            <li class="set-prof">
                                <a href="{{ url('perguntas/' . $value->id) }}" class="set">Abrir pergunta</a>
                            </li>
                            <li class="set-prof">
                                <a class="set" href="{{ url('perguntas/' . $value->id . '/edit') }}">Editar</a>
                            </li>
                            
                            <li class="set-prof"><a class="set" href="{{url('perguntas/answer/'.$value->id)}}">Responder</a></li>
                        </ul>
                    </div>

                    <img class="profile-post-pic-my" src="{{ Auth::user()->img_profile }}">
                    <div class="post">
                        <p class="title-my">{{ $value->title }}</p>
                        <p class="desc-my">{{ $value->description }}</p>
                    </div>
                </div>
            @endif
        @endforeach


    </div>

   <div>
    <div class="following-box">
        <div >
            <h5 class="friends-title">SEGUINDO</h5>
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
            <a href="{{ url('/following/'.$val->id.'/remove') }}"><h6 id="seguir">-</h6></a>
        </div>
        @endforeach
    </div>

    <div class="followers-box">
        <div >
            <h5 class="friends-title">SEGUIDORES</h5>
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
                </div>
                @endif
            @endforeach
        @endforeach
    </div>
    </div>

    <!--
    @foreach ($questions as $question)

        <div class="jumbotron text-center">
            <h2>Título: {{ $question->title }}</h2>
            <p>
                <strong>Descrição:</strong> {{ $question->description }}
            </p>

            <h3>Respostas:</h3>

                @foreach($question->answers as $key => $answers) 
                    <p><strong>{{$answers->user->first_name}}: </strong>{{$answers->description}}</p>
                @endforeach
        </div>
    @endforeach -->

@endsection
