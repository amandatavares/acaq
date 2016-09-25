<!-- app/views/questions/index.blade.php -->

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
        <a class="navbar-brand" href="{{ URL::to('perguntas') }}">ACAQ</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('perguntas') }}">View All questions</a></li>
        <li><a href="{{ URL::to('perguntas/create') }}">Create a Question</a>
    </ul>
</nav>

<h1>All the questions</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Description</td>
            <!-- <td>Nerd Level</td> -->
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($questions as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->description }}</td>
            <!-- <td>{{ $value->nerd_level }}</td> -->

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /questions/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /questions/{id} -->
                <a class="btn btn-small btn-success" href="{{ url('perguntas/' . $value->id) }}">Show this Nerd</a>

                <!-- edit this nerd (uses the edit method found at GET /questions/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ url('perguntas/' . $value->id . '/edit') }}">Edit this Nerd</a>
                <!--Deleta
                <a class="btn btn-small btn-info" href="{{ url('perguntas/delete/'.$value->id) }}">Delet</a> -->
                <a>
                    <td>
                        <form action="/perguntas/delete/{{ $value->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                             <button>Delete Task</button>
                
                        </form>
                    </td>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
