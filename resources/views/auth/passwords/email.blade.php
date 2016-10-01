<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/c453614277.js"></script>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
  <div class="container-fluid">
    <div class="bar-header">
      <div class="logo-bar">
      </div>
    </div>
    <div class="logo-sign">
      <img class="img-responsive" src="http://placehold.it/300x100">
    </div>
    <h3 id="change_pass"  >Mudar minha senha</h3>


    <div class="box-sign">
      @if (session('status'))
        <div class="alert alert-success">
         {{ session('status') }}
         </div>
      @endif

      <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
      {{ csrf_field() }}

      <div  class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" id="reset-email">E-mail</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
          <span class="help-block">
          <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>

        <button class="btna btn-login form-group input-text "  id="reset-btn" type="submit" name="signup">Link para mudar de senha</button>
      </form>
    </div>

  </div>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
