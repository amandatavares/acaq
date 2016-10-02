@extends('layouts.app1')

@section('content')

	@if(count==0)
		<p>Não tem ninguém</p>
	@else
		@foreach ($users as $user)

			@if($user->getFullName()==$search or $user->first_name==$search)
		        <div class="jumbotron text-center">
		            <h2>Nome: {{ $user->getFullName() }}</h2>
	            	<h3>Email: {{ $user->email }}</h3>
		            {{count+=1}}
		        </div>
		    @endif

	    @endforeach
	@endif

@endsection