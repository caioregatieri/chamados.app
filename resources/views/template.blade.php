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
        <!-- Custom -->
        <link name="custom" rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <style>
            .nav > .dropdown > .dropdown-toggle {
                color: #f8f8f8 !important;
            }
            .nav > li > a:hover {
                text-decoration: none;
                background-color: #167ac6 !important;
            }
        </style>
        @if(Auth::user()->usertype->administrator != "1")
            <style>
                #page-wrapper {
                    margin-left: 0;
                }
            </style>
        @endif
        @yield('head')
    </head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" style="color: #f8f8f8; background-color: #337ab7;" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="color: #f8f8f8;" href="{{ route('home') }}">Chamados técnicos</a>
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
            @if(Auth::user()->usertype->administrator == "1")
                @include('sidebar', [])
            @endif
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

    <script>
        $(".number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    </script>
    @yield('scripts')
</body>

</html>
