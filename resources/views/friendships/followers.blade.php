@extends('layouts.app1')

@section('content')
		
		
		<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4 class="follow">SEGUIDORES</h4>
				<div class="search-box">

					<div class="friendsp-box">

					@foreach($followers as $f)
    					@foreach($users as $user)
	    					@if($f == $user->id)
								<div class="friendsp">
									<a href="{{ url('profile/' . $user->id . '') }}"><img class="profile-friendp-pic" src="{{ $user->img_profile }}"></a>
									<a href="{{ url('profile/' . $user->id . '') }}"><h5>{{ $user->getFullName() }}</h5></a>
									<h6>{{ $user->email }}</h6>
									<a href="{{ url('followers/'.$user->id) }}">Seguir de volta</a>
								</div>
							@endif
						@endforeach
					@endforeach
					</div>	
				</div>
			</div>
		</div>
	</div>


@endsection