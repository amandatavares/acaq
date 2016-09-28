<!-- app/views/nerds/show.blade.php -->

@extends('layouts.app')

@section('content')

<h1>Showing Question {{ $question->id }}</h1>

    <div class="jumbotron text-center">
        <h2>Título: {{ $question->title }}</h2>
        <p>
            <strong>Descrição:</strong> {{ $question->description }}
        </p>

        <h3>Respostas:</h3>

            @foreach($answers as $key => $answers) 
                <p>{{$answers->description}}</p>
            @endforeach

        <!-- Consertar src da image 
        <img class="img-responsive" style="width:150px;height:150px" src="{{ $question->img_path }}" alt="" /> -->
    </div>

@endsection
