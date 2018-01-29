<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ route('calls.index') }}"><i class="fa fa-phone fa-fw"></i> Chamados</a>
            </li>
            <li>
                <a href="{{ route('callmodes.index') }}"><i class="fa fa-cog fa-fw"></i> Tipos de chamados</a>
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
                <a href="{{ route('reminders.index') }}"><i class="fa fa-file-text-o"></i> Lembretes</a>
            </li>
            <li>
                <a href="{{ route('about') }}"><i class="fa fa-info fa-fw"></i> Sobre</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->