<!DOCTYPE html>
<html>
<head>
	<title>Bem-Vindo</title>
	<link rel="stylesheet" type="text/css" href="/css/welcome.css">
	<meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="description" content="">
	  <meta name="author" content="">

	  <script src="js/jquery.js"></script>
	  <script src="js/bootstrap.min.js"></script>

	  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="all">
	  <link rel="stylesheet" type="text/css" href="/css/posts.css">
	  <link rel="stylesheet" type="text/css" href="/css/nav.css">
	  <link rel="stylesheet" type="text/css" href="/css/style.css">
	  <link rel="stylesheet" type="text/css" href="/css/vertical-nav.css">
	  <link rel="stylesheet" type="text/css" href="/css/index-post.css">
	  <link rel="stylesheet" type="text/css" href="/fonts/stylesheet.css">
</head>
<body>
	<h1 class="first">Você tem alguma dúvida?</h1>
	<h4 class="second">Deixe-nos encontrar a melhor resposta para você!</h4>
	<form class="botoes pull-right">
		<a class="botao1" href="{{ url('/login') }}">ENTRAR</a>      
      <a class="botao2" href="{{ url('/register') }}">Ainda não tem cadastro?</a> 
    </form>
</body>
</html>