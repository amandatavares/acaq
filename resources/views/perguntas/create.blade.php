<!-- app/views/perguntas/create.blade.php -->

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

    {{ Form::submit('Create the Question!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
