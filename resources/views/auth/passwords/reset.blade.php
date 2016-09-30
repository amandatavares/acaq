@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="bar-header">
      <div class="logo-bar">
      </div>
    </div>
    <div class="logo-sign">
      <img class="img-responsive" src="http://placehold.it/300x100">
    </div>
    <h2 id="change_pass">Mudar minha senha</h2>


    <div class="box-sign">

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
    {{ csrf_field() }}

    <input type="hidden" name="token" value="{{ $token }}">

    <div  class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <label for="email">E-mail</label>
      <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
      @if ($errors->has('email'))
        <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
        </span>
      @endif
    </div>

    <div  class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <label for="password">Senha</label>
      <input id="password" type="password" class="form-control" name="password" required>
      @if ($errors->has('password'))
        <span class="help-block">
        <strong>{{ $errors->first('password') }}</strong>
        </span>
      @endif
    </div>

    <div  class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
      <label for="password-confirm">Confirmar senha</label>
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
       @if ($errors->has('password_confirmation'))
          <span class="help-block">
          <strong>{{ $errors->first('password_confirmation') }}</strong>
          </span>
       @endif
    </div>

      <button class="btna btn-login form-group input-text" type="submit" name="signup">Mudar minha senha</button>
    </form>
    </div>

  </div>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
@endsection
