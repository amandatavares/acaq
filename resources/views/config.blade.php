@extends('layouts.app1')

@section('content')

  <div class="container-fluid">

    <div class="box-sign">

    <form method="POST" action="{{ url('/config') }}">
    {{ csrf_field() }}

    <div  class="form-group">
      <label for="first_name">Nome</label>
      <input type="text" id="first_name" class=" input-text" name="first_name" value="{{ Auth::user()->first_name }}">
    </div>

    <div class="form-group">
      <label for="last_name">Sobrenome</label>
      <input id="last_name" type="text" class=" input-text" name="last_name" value="{{ Auth::user()->last_name }}">
    </div>
          
    <div class="form-group">
      <label>Foto do Perfil</label>
      {{ Form::file('img_profile_path', array('class' => 'set')) }}
    </div>
                      
      {{ Form::submit('Atualizar Dados', array('class' => 'set', 'value'=>'')) }}



    </form>


    </div>

  </div>

  <script src="/js/jquery.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/main.js"></script>
@endsection