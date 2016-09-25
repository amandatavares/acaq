<!-- app/views/nerds/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ url('perguntas') }}">ACAQ</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ url('perguntas') }}">View All Questions</a></li>
        <li><a href="{{ url('perguntas/create') }}">Create a Question</a>
    </ul>
</nav>

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

</div>
</body>
</html>
