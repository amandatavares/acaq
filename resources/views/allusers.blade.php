@extends('layouts.app')

@section('content')

<h1>All Users</h1>

    @foreach($users as $user)
        <div class="jumbotron text-center">
            <h2>Nome: {{ $user->getFullName() }}</h2>
            <h3>Email: {{ $user->email }}</h3>
            <a href="{{ url('') }}">Veja as publicações</a>
            <a href="{{ url('perguntas') }}">Adicionar como amigo</a>
        </div>
    @endforeach

@endsection