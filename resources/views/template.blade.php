<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <!-- Bootstrap -->
        <link name="bootstrap" rel="stylesheet" href="{{ asset('css/boot.min.css') }}">
        <!-- MetisMenu -->
        <link name="metismenu" rel="stylesheet" href="{{ asset('css/metisMenu.min.css') }}">
        <!-- SB Admin 2 -->
        <link name="sbadmin" rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">
        <!-- font-awesome -->
        <link name="fontawesome" rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        @yield('head')
        <!-- Custom -->
        <link name="custom" rel="stylesheet" href="{{ asset('css/custom.css') }}">
    </head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}">Chamados técnicos</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> {{Auth::user()->name}} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ route('users.show',['id'=>Auth::user()->id]) }}"><i class="fa fa-user fa-fw"></i> Perfil</a>
                        </li>
                        <li><a href="{{ route('users.edit',['id'=>Auth::user()->id]) }}"><i class="fa fa-gear fa-fw"></i> Configurações</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ route('getLogout') }}"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                        <li>
                          <a href="{{ route('calls.index') }}"><i class="fa fa-phone fa-fw"></i> Chamados</a>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-home fa-fw"></i> Locais</a>
                          <ul class="nav nav-second-level">
                            <li><a href="{{ route('departaments.index') }}">Secretarias</a></li>
                            <li><a href="{{ route('places.index') }}">Setores</a></li>
                          </ul>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-users fa-fw"></i> Usuarios</a>
                          <ul class="nav nav-second-level">
                            <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                            <li><a href="{{ route('usertypes.index') }}">Tipos</a></li>
                          </ul>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-print fa-fw"></i> Relátorios</a>
                          <ul class="nav nav-second-level">
                            <li><a href="{{ route('reports.calls.get') }}"><i class="fa fa-phone"></i> Chamados</a></li>
                            <li><a href="{{ route('reports.departaments.get') }}"><i class="fa fa-home"></i> Secretarias</a></li>
                            <li><a href="{{ route('reports.places.get') }}"><i class="fa fa-home"></i> Setores</a></li>
                            <li><a href="{{ route('reports.users.get') }}"><i class="fa fa-users"></i> Usuários</a></li>
                            <li><a href="{{ route('reports.usertypes.get') }}"><i class="fa fa-users"></i> Tipos de usuários</a></li>
                          </ul>
                        </li>
                        <li>
                          <a href="{{ route('about') }}"><i class="fa fa-info fa-fw"></i> Sobre</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <br/>
            <br/>
            <br/>
            @yield('content')
            <div id="rodape">
                Desenvolvido por <a href="mailto: caio.cesar.regatieri@gmail.com">Caio Regatieri</a>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>


    <!-- JQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/boot.min.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/metisMenu.min.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>
    @yield('scripts')
</body>

</html>
