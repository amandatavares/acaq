
@extends('layouts.app')

@section('content')

<h1>Comment the Question</h1>

<!-- if there are creation errors, they will show here -->
<!-- {{ Html::ul($errors->all()) }} -->

{{ Form::open(['url' => ['perguntas/answer',$question->id], 'files' => true]) }}

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', old('description'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('OK', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection
