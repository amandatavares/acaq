@extends('layouts.app1')

@section('content')
		
		
		<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-box">
					<div class="friendsp-box">
					@foreach ($users as $user)
					@if($user->getFullName()==$search or $user->first_name==$search)
						<div class="friendsp">
							<a href="{{ url('profile/' . $user->id . '') }}"><img class="profile-friendp-pic" src="{{ $user->img_profile }}"></a>
							<a href="{{ url('profile/' . $user->id . '') }}"><h5>{{ $user->getFullName() }}</h5></a>
							<h6>{{ $user->email }}</h6>
						</div>
					@endif
					@endforeach
					</div>	
				</div>
			</div>
		</div>
	</div>


@endsection