@extends('layouts.app')

@section('content')

    <h1>Categorias</h1>
    @foreach ($categories as $categorie)

        <div class="jumbotron text-center">
            <h2>Categoria: {{ $categorie->name }}</h2>
            <h3>Perguntas:</h3>
            @foreach($categorie->questions as $question)
                    <p><strong>Title: </strong>{{$question->title}}</p>
                    <p><strong>Description: </strong>{{$question->description}}</p>
            @endforeach
        </div>

    @endforeach

@endsection
