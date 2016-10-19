<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('css/boot.min.css') }}">
        <!-- font-awesome -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        @yield('head')
    </head>
    <body>
      <div class="container-fluid">
      	<div class="row">
      		<div class="col-md-12">
            <nav class="navbar navbar-default" role="navigation">
      				<div class="navbar-header">
      					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
      					</button> <a class="navbar-brand" href="{{ route('home') }}">Chamados Técnicos</a>
      				</div>
      				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      					<ul class="nav navbar-nav navbar-right">
        						<li>
                      <a href="{{ route('getLogin') }}">Entrar</a>
        						</li>
      					</ul>
      				</div>
      			</nav>
            <div id="container" class="container">
                @yield('content')
            </div>
          </div>
      	</div>
      </div>
    </div>
    <div id="rodape">
      &nbsp;&nbsp;&nbsp;&nbsp;Desenvolvido por <a href="mailto: caio.cesar.regatieri@gmail.com">Caio Regatieri</a>
    </div>
    <!-- JQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/boot.min.js') }}"></script>
    @yield('scripts')
  </body>
</html>
