<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ACAQ Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/c453614277.js"></script>


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
    <link href="css/main.css" rel="stylesheet">
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
<div class="vid-container">
    <video class="bgvid" autoplay="autoplay" muted="muted" preload="auto" loop>
        <source src="img/bg2.mp4" type="video/mp4">
    </video>
    <div class="inner-container">
      <video class="bgvid inner" autoplay="autoplay" muted="muted" preload="auto" loop>
        <source src="img/bg2.mp4" type="video/mp4">
      </video>
      <div class="box">
        <h1>ACAQ</h1>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        	{{ csrf_field() }}

        	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	       		<input class="input-text" type="text" placeholder="E-mail" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
	       		@if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
	        </div>

	        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	        	<input class="input-text" type="password" placeholder="Senha" id="password" type="password" name="password" required>
	        	@if ($errors->has('password'))
                     <span class="help-block">
                     <strong>{{ $errors->first('password') }}</strong>
                     </span>
                @endif
	        </div>

          <!--
	        <div >
            	<div >
                    <label class="check" > Me lembre </label>
                    <input type="checkbox" name="remember" id="box-check">
                </div>
            </div>
            -->
	        <button class="btna btn-login input-text" type="submit">Entrar</button>

	        <p id="forgot"> <a   href="{{ url('/password/reset') }}">
                Esqueceu a sua senha? </a> </p>

	        <p>Não está registrado? <a href="/register">Cadastre-se</a></p>

        </form>
      </div>
    </div>
  </div>
 <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
