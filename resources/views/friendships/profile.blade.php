@extends('layouts.app1')

@section('content')

<!--Profile-->
    <div class="profile-box">
        <div class="cover-pic">
            <img class="cover" src="/img/cover.png">
            <img class="profile-pic" src="{{ $friend->img_profile }}">
            <h1 class="name">{{ $friend->first_name }} {{ $friend->last_name }}</h1>
        </div>
        @if(Auth::user()->isFriend($friend->id)==false and Auth::user()->id!=$friend->id)
            <a class="botao1" href="{{ url('profile_user/'.$friend->id.'/followers/'.$friend->id) }}">SEGUIR+</a>
        @elseif(Auth::user()->id!=$friend->id)
            <a class="botao1" href="{{ url('profile_user/'.$friend->id.'/followers/'.$friend->id.'/remove') }}">DEIXAR DE SEGUIR</a>
        @endif

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
