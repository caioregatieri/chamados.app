<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-book fa-fw"></i> Chamados<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('calls.create') }}"><i class="fa fa-plus fa-fw"></i> Adicionar</a>
                    </li>
                    <li>
                        <a href="{{ route('calls.index') }}"><i class="fa fa-list fa-fw"></i> Explorar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-home fa-fw"></i> Locais<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('places.index') }}"><i class="fa fa-home fa-fw"></i> Departamentos</a>
                    </li>
                    <li>
                        <a href="{{ route('departaments.index') }}"><i class="fa fa-home fa-fw"></i> Secretarias</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> Usuários<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('users.index') }}"><i class="fa fa-list fa-fw"></i> Explorar</a>
                    </li>
                    <li>
                        <a href="{{ route('userstypes.index') }}"><i class="fa fa-user fa-fw"></i> Tipos</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('about') }}"><i class="fa fa-info-circle fa-fw"></i> Sobre</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->