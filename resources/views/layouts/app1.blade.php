<!DOCTYPE html>
<html lang="en">
<head>
    <!-- FROM THE ORIGINAL app.blade.php -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Bootstrap Core CSS -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/main.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/c453614277.js"></script>


        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Alguém conhece?</title>

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    <!-- END OF ORIGINAL app.blade.php -->

        <!-- Scripts -->
        <script src="/js/jquery.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/custom.js"></script>
    
    <!-- START OF acaq imports -->      
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/nav.css">
        <link rel="stylesheet" type="text/css" href="/css/search.css">
        <link rel="stylesheet" type="text/css" href="/css/posts.css">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <link rel="stylesheet" type="text/css" href="/css/vertical-nav.css">
        <link rel="stylesheet" type="text/css" href="/css/index-post.css">
        <link rel="stylesheet" type="text/css" href="/css/profile.css">
        <link rel="stylesheet" type="text/css" href="/fonts/stylesheet.css">

    <!-- END OF acaq imports -->
</head>

<body>

    <nav class="navbar navbar-acaq" role="navigation">
    <div class="container">

         <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/home') }}">
          <img src="/img/Logo.png" class="navbar-logo" alt="" />
        </a>
      </div>

      <div class="box-search">

        <form class="navbar-form" action="{{ url('/pesquisa') }}" method="post">
          <input type="text" class="acaq-input" placeholder="Pesquise por usuários e perguntas" name="search">

          <input type="submit" class="btn-search" name=" ">

        </form>

      </div>

      <ul class="nav navbar-nav navbar-right">
      <li>
        <h3 id="user_title">{{ Auth::user()->first_name }}</h3>
      </li>

        <li>
          <div class="dropdown dropdown-profile">
            <button class="btn-trans dropdown-toggle" type="button" data-toggle="dropdown">
              <!-- http://loremflickr.com/200/200/woman,profile -->
              <img src="{{ Auth::user()->img_profile }}" class="user-icon" alt="" />
              </button>
              <ul class="dropdown-menu profile-drop">
                  <li class="set-prof"><a class="set" href="{{ url('/profile') }}">Meu Perfil</a></li>
                  <li class="set-prof"><a class="set" href="#">Ajuda</a></li>
                  <li class="set-prof"><a class="set" href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">Sair</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
          </li>
        </ul>
    </div>
    </nav>

    <!-- VERTICAL NAVBAR -->
    <div class="drop">
      <nav class="nav nav-aberta">
        <div class="wrap">
          <ul class="listaNav">

            <button class="btn-trans" type="button">
              <li>
                <a href="{{ url('/home') }}" title="Home">
                  <img class="btn-post img-vertical-set-box" src="/img/home.png" alt=""/>
                </a>
              </li>
              </button>


              <li>
              <div class="dropdown dropdown-conf" title="Categorias">
                <button id="vert" class="btn-trans dropdown-toggle" type="button" data-toggle="dropdown">
                  <!-- http://loremflickr.com/200/200/woman,profile -->
                  <img src="/img/category.png" class="btn-post img-vertical-set-box" alt="" />
                  </button>

                  <ul class="dropdown-menu set-drop">
                    <li class="set"><a class="set" href="/category/1">Achados e perdidos ( {{App\Category::find(1)->questions->count()}} )</a></li>
                    <li class="set"><a class="set" href="/category/2">Animais ( {{App\Category::find(2)->questions->count()}} )</a></li>
                    <li class="set"><a class="set" href="/category/3">Artes e entretenimento ( {{App\Category::find(3)->questions->count()}} )</a></li>
                    <li class="set"><a class="set" href="/category/4">Comida ( {{App\Category::find(4)->questions->count()}} )</a></li>
                    <li class="set"><a class="set" href="/category/5">Compras e vendas ( {{App\Category::find(5)->questions->count()}} )</a></li>
                    <li class="set"><a class="set" href="/category/6">Empregos ( {{App\Category::find(6)->questions->count()}} )</a></li>
                    <li class="set"><a class="set" href="/category/7">Família e relacionamentos ( {{App\Category::find(7)->questions->count()}} )</a></li>
                    <li class="set"><a class="set" href="/category/8">Lazer ( {{App\Category::find(8)->questions->count()}} )</a></li>
                    <li class="set"><a class="set" href="/category/9">Notícias e eventos ( {{App\Category::find(9)->questions->count()}} )</a></li>
                    <li class="set"><a class="set" href="/category/10">Ofertas e descontos ( {{App\Category::find(10)->questions->count()}} )</a></li>
                    <li class="set"><a class="set" href="/category/11">Religião e espiritualidade ( {{App\Category::find(11)->questions->count()}} )</a></li>
                    <li class="set"><a class="set" href="/category/12">Saúde ( {{App\Category::find(12)->questions->count()}} )</a></li>
                    <li class="set"><a class="set" href="/category/13">Tecnologia ( {{App\Category::find(13)->questions->count()}} )</a></li>
                    <li class="set"><a class="set" href="/category/14">Viagens e turismo ( {{App\Category::find(14)->questions->count()}} )</a></li>
                    <li class="set"><a class="set" href="/category/15">Outros ( {{App\Category::find(15)->questions->count()}} )</a></li>
                    
                </ul>
              </div></li>

              <li>
              <div class="dropdown dropdown-conf" title="Opções de seguir">
                <button id="vert" class="btn-trans dropdown-toggle" type="button" data-toggle="dropdown">
                  <!-- http://loremflickr.com/200/200/woman,profile -->
                  <img src="/img/follow_request.png" class="btn-post img-vertical-set-box" alt="" />
                  </button>

                  <ul class="dropdown-menu set-drop">
                    <li class="set"><a class="set" href="{{ url('/following/questions') }}">Ver perguntas de quem sigo</a></li>
                    <li class="set"><a class="set" href="{{ url('/following') }}">Seguindo</a></li>
                    <li class="set"><a class="set" href="{{ url('/followers') }}">Seguidores</a></li>
                    
                </ul>
              </div></li>

              <li>
              <div class="dropdown dropdown-conf" title="Alterar imagem do Perfil">
                <button id="vert" class="btn-trans dropdown-toggle" type="button" data-toggle="dropdown">
                  <!-- http://loremflickr.com/200/200/woman,profile -->
                  <img src="/img/user.png" class="btn-post img-vertical-set-box" alt="" />
                  </button>
                  <ul class="dropdown-menu set-drop">

                  {{ Form::open(array('url' => '/profileimg', 'files' => true, 'class' => 'set')) }}
                   
                    {{ Form::file('img_profile_path', array('class' => 'set')) }}
                    
                    {{ Form::submit('Enviar', array('class' => 'set', 'id'=>'myPic', 'value'=>'Alterar minha foto do perfil')) }}

                    <script type="text/javascript">
                        $('#myPic').bind('change', function() {
                          var mySize = this.files[0].size;

                          if (mySize>2048000.0) {alert("ERRO: " + $("#err1").text());}
                          
                          });
                      </script>
                      <p id="err1" class="hidden">Tamanho da imagem maior que o suportado!<br> Tamanho máximo suportado: 2,048Mb </p>
                      
                  {{ Form::close() }}
                      

                </ul>
              </div>
            </li>

            <li>
              <div class="dropdown dropdown-conf" title="Configurações gerais da conta">
                <button id="vert" class="btn-trans dropdown-toggle" type="button" data-toggle="dropdown">
                  <!-- http://loremflickr.com/200/200/woman,profile -->
                  <img src="/img/settings.png" class="btn-post img-vertical-set-box" alt="" />
                  </button>
                  <ul class="dropdown-menu set-drop">
                    <li class="set"><a class="set" href="{{ url('/config') }}">Configurações gerais da conta</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <!-- VERTICAL NAVBAR -->

    <div class="container">
        @yield('content')
    </div>

</body>
</html>
