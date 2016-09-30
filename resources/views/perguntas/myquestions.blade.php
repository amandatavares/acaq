@extends('layouts.app')

@section('content')

<h1>Showing My Questions</h1>
    
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

            <!-- Consertar src da image 
            <img class="img-responsive" style="width:150px;height:150px" src="{{ $question->img_path }}" alt="" /> -->
        </div>
    @endforeach

@endsection
