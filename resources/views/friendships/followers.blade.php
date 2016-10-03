@extends('layouts.app1')

@section('content')

	<div class="container">
		
		
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

									<div>
									<a href="{{ url('profile/' . $user->id . '') }}"><h5>{{ $user->getFullName() }}</h5></a>
									<h6>{{ $user->email }}</h6>
									</div>
										
									@if (Auth::user()->isFriend($user->id)==FALSE)
										<a href="{{ url('followers/'.$user->id) }}"><h6 id="seguir">Seguir de volta</h6></a>
									@endif

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