@extends('layouts.app')

@section('content')

<h1>My Friends</h1>

    @foreach($friend->questions as $q)
        <div class="jumbotron text-center">
            <h2>Titulo: {{ $q->title }}</h2>
            <h3>Descrição: {{ $q->description }}</h3>
        </div>
    @endforeach

@endsection
