<!-- app/views/nerds/edit.blade.php -->

@extends('layouts.app')

@section('content')
    

    <h1>Edit question {{ $question->id }}</h1>

    {{ Form::model($question, ['url' => ['perguntas/edit', $question->id], 'files' => true]) }}

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::text('description', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('img_path', 'Image Path') }}
            {{ Form::file('img_path', array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Edit the Question!', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
