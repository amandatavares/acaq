<!-- app/views/perguntas/create.blade.php -->

@extends('layouts.app')

@section('content')

<h1>Create a Question</h1>

<!-- if there are creation errors, they will show here -->
<!-- {{ Html::ul($errors->all()) }} -->

{{ Form::open(array('url' => 'perguntas', 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', old('title'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', old('description'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('img_path', 'Image Path') }}
        {{ Form::file('img_path', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Create the Question!', array('class' => 'btn btn-primary', 'src' => 'question.png')) }}

{{ Form::close() }}

@endsection
