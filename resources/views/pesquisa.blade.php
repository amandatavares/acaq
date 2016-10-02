@extends('layouts.app1')

@section('content')

		@foreach ($users as $user)

			@if($user->getFullName()==$search or $user->first_name==$search)
		        <div class="jumbotron text-center">
		            <h2>Nome: {{ $user->getFullName() }}</h2>
	            	<h3>Email: {{ $user->email }}</h3>
		        </div>
		    @endif

	    @endforeach

@endsection