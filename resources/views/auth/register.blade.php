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
    <div class="box-sign">

    <form role="form" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}
    <div  class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
      <label for="first_name">Nome</label>
      <input type="text" id="first_name" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
      @if ($errors->has('first_name'))
         <span class="help-block">
         <strong>{{ $errors->first('first_name') }}</strong>
         </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
      <label for="last_name">Sobrenome</label>
      <input value="" id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>
      @if ($errors->has('last_name'))
        <span class="help-block">
        <strong>{{ $errors->first('last_name') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <label for="email">Digite seu E-mail</label>
      <input value="" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
      @if ($errors->has('email'))
        <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <label for="password">Crie uma senha</label>
      <input value="" id="password" type="password" class="form-control" name="password" required>
      @if ($errors->has('password'))
        <span class="help-block">
        <strong>{{ $errors->first('password') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
      <label for="password-confirm">Crie uma senha</label>
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
      @if ($errors->has('password_confirmation'))
        <span class="help-block">
        <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
      @endif
    </div>

      <small>Ao inscrever-se você concorda com os <a href="#">Termos de Uso</a> e a <a href="#">Política de Privacidade</a>.</small>
      <button class="btna btn-login form-group type="submit" name="signup">Criar conta</button>
    </form>
    </div>

  </div>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
@endsection
