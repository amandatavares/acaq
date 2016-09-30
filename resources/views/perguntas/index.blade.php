<!-- app/views/questions/index.blade.php -->

@extends('layouts.app')

@section('content')

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
            <td>User</td>
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
                <a class="btn btn-small btn-success" style="float:left" href="{{ url('perguntas/' . $value->id) }}">Show this Nerd</a>

                <!-- edit this nerd (uses the edit method found at GET /questions/{id}/edit -->
                <a class="btn btn-small btn-info" style="float:left"  href="{{ url('perguntas/' . $value->id . '/edit') }}">Edit this Nerd</a>
                <!--Deleta
                <a class="btn btn-small btn-info" href="{{ url('perguntas/delete/'.$value->id) }}">Delet</a> -->
                <!--<a class="btn btn-small btn-danger" href="{{ url('perguntas/delete/'.$value->id) }}">Delete this Nerd</a> -->
                <form action="/perguntas/{{ $value->id }}" method="POST" style="float:left">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-small btn-danger">Delete Task</button>
                </form> 
                <a class="btn btn-small btn-warning" style="float:left" href="{{url('perguntas/answer/'.$value->id)}}">Answer</a>
            </td>
            <td>{{ $value->user->first_name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection