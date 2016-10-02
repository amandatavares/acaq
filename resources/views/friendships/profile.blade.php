@extends('layouts.app1')

@section('content')

<!--Profile-->
    <div class="profile-box">
        <div class="cover-pic">
            <img class="cover" src="/img/cover.png">
            <img class="profile-pic" src="{{ $friend->img_profile }}">
            <h1 class="name">{{ $friend->first_name }} {{ $friend->last_name }}</h1>
            <!--<a href="profile.php"><h1 class="user">@mary_janne2016</h1></a>-->
        </div>

        @foreach ($friend->questions as $q)
            @if ( $q->user_id === $friend->id)
            <div class="publication-box">
                <img class="profile-post-pic-my" src="{{ $q->user_img }}">
                <div class="post">
                    <p class="title-my">{{ $q->title }}</p>
                    <p class="desc-my">{{ $q->description }}</p>
                    <div class="dropdown dropdown-post-my pull-right">
                        <button class="btn-trans dropdown-toggle" type="button" data-toggle="dropdown">
                            <!-- http://loremflickr.com/200/200/woman,profile -->
                            <span class="caret"></span>
                        </button>

                        <ul class="dropdown-menu post-drop">
                            <li class="set-prof"><a href="{{ url('perguntas/' . $q->id) }}" class="set">Abrir pergunta</a></li>
                            <li class="set-prof"><a class="set" href="{{ url('perguntas/' . $q->id . '/edit') }}">Editar</a></li>
                            <li class="set-prof"><a class="set">
                                <form action="/perguntas/{{ $q->id }}" method="POST" style="float:left">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button>Apagar</button>
                                </form> 
                                </a></li>
                            <li class="set-prof"><a class="set" href="{{url('perguntas/answer/'.$q->id)}}">Responder</a></li>
                        </ul>



                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>

    <div class="friends-box">
    	<div>
            <h5 class="friends-title">SEGUINDO</h5>
        </div>
        @if( $friend_f === null )
            <div class="friends">
                <h5>Está seguindo ninguém</h5>
                <h5></h5>
            </div>
        @endif
        
        @foreach ($friend_f as $key => $val)
        <div class="friends">
            <img class="profile-friend-pic" src="{{ $val->img_profile }}">
            <h5>{{ $val->first_name }}</h5>
            <h6>{{ $val->email }}</h6>
        </div>
        @endforeach
    </div>





@endsection
