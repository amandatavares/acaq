@extends('layouts.app')

@section('content')

<h1>All Users</h1>

    @foreach($users as $user)
    	@if(Auth::user()->id != $user->id)
	        <div class="jumbotron text-center">
	            <h2>Nome: {{ $user->getFullName() }}</h2>
	            <h3>Email: {{ $user->email }}</h3>
	            @if (Auth::user()->isFriend($user->id)==FALSE)
		            <a href="{{ url('home') }}">Ver perfil</a>
		            <a href="{{ url('add_user/'.$user->id) }}">Adicionar como amigo</a>
		        @endif
	        </div>
        @endif
    @endforeach

@endsection