@extends('layouts.app')

@section('content')

<h1>All Users</h1>

    @foreach($follows as $f)
    	@foreach($users as $user)
	    	@if($f == $user->id)
		        <div class="jumbotron text-center">
		            <h2>Nome: {{ $user->getFullName() }}</h2>
		            <h3>Email: {{ $user->email }}</h3>
			        <a href="{{ url('home') }}">Ver perfil</a>
			        <a href="{{ url('add_user/'.$user->id) }}">Adicionar como amigo</a>
		        </div>
	        @endif
        @endforeach
    @endforeach

@endsection