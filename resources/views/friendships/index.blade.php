@extends('layouts.app')

@section('content')

<h1>My Friends</h1>

    @foreach($friends as $friend)
        <div class="jumbotron text-center">
            <h2>Nome: {{ $friend->getFullName() }}</h2>
            <h3>Email: {{ $friend->email }}</h3>
            <a href="{{ url('myfriends/' . $friend->id . '/questions') }}">Veja as publicações</a>
        </div>
    @endforeach

@endsection
