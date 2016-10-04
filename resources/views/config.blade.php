@extends('layouts.app1')

@section('content')

  <div class="container-fluid">

    <div class="box-sign">

    <form method="POST" action="{{ url('/config') }}">

    <div  class="form-group">
      <label for="first_name" style="font-family: Nexa;">Nome</label>
      <input type="text" id="first_name" class="input-text" style="font-family: Nexa;" name="first_name" value="{{ Auth::user()->first_name }}">
    </div>

    <div class="form-group">
      <label for="last_name" style="font-family: Nexa;">Sobrenome</label>
      <input id="last_name" type="text" class=" input-text" style="font-family: Nexa;" name="last_name" value="{{ Auth::user()->last_name }}">
    </div>
          
    <div class="form-group">
      <label>Foto do Perfil</label>
      {{ Form::file('img_profile_path', array('class' => 'set','style'=>'font-family: Nexa;')) }}
    </div>
                      
      {{ Form::submit('Atualizar Dados', array('class' => 'set')) }}



    </form>


    </div>

  </div>

  <script src="/js/jquery.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/main.js"></script>
@endsection