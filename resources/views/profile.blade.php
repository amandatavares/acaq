@extends('layouts.app1')

@section('content')

<!--Profile-->
    <div class="profile-box">
        <div class="cover-pic">
            <img class="cover" src="/img/cover.png">
            <img class="profile-pic" src="{{ Auth::user()->img_profile }}">
            <a href="{{ url('/profile') }}"><h1 class="name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1></a>
            <!--<a href="profile.php"><h1 class="user">@mary_janne2016</h1></a>-->
        </div>

        @foreach ($questions as $key => $value)
            @if ( $value->user_id === Auth::user()->id)
            <div class="publication-box">
                <img class="profile-post-pic-my" src="{{ Auth::user()->img_profile }}">
                <div class="post">
                    <p class="title-my">{{ $value->title }}</p>
                    <p class="desc-my">{{ $value->description }}</p>
                    <div class="dropdown dropdown-post-my pull-right">
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
                </div>
            </div>
            @endif
        @endforeach


    </div>

   
    <div class="friends-box">
        <div >
            <h5 class="friends-title">SEGUINDO</h5>
        </div>
        @if( $friends === null )
            <div class="friends">
                <h5>Você está seguindo ninguém</h5>
                <h5>Procure um amigo!</h5>
            </div>
        @endif
        
        @foreach ($friends as $key => $val)
        <div class="friends">
            <h4></h4>
            <img class="profile-friend-pic" src="{{ $val->img_profile }}">
            <h5>{{ $val->first_name }}</h5>
            <h6>{{ $val->email }}</h6>
        </div>
        @endforeach
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
