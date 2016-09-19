<!-- app/views/nerds/show.blade.php -->

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

<h1>Showing Question {{ $question->id }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $question->title }}</h2>
        <p>
            <strong>Descrição:</strong> {{ $question->description }}
        </p>
        <!-- Consertar src da image -->
        <img class="img-responsive" style="width:150px;height:150px" src="{{ $question->img_path }}" alt="" />
    </div>

</div>
</body>
</html>
