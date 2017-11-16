@role('superadmin')
<li class="treeview">
    <a href="#">
        <i class="fa fa-group"></i>
        <span>Usuários</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>

    <ul class="treeview-menu">
        <li class="{{ Request::is('/usuarios/administradores') ? 'active' : '' }}">
            <a href="{{ url('usuarios/administradores') }}"> 
                &nbsp; Administradores
            </a>
        </li>
        <li class="{{ Request::is('usuarios/sindicalistas') ? 'active' : '' }}">
            <a href="{{ url('usuarios/sindicalistas') }}"> 
                &nbsp; Sindicalistas
            </a>
        </li>
        <li class="{{ Request::is('usuarios/funcionarios') ? 'active' : '' }}">
            <a href="{{ url('usuarios/funcionarios') }}"> 
                &nbsp; Funcionários
            </a>
        </li>
        <li class="{{ Request::is('usuarios') ? 'active' : '' }}">
            <a href="{{ url('usuarios') }}"> 
                &nbsp; Todos
            </a>
        </li>
    </ul>
</li>
@endrole

@role('sindicalista')
    <li class="{{ Request::is('usuarios/funcionarios') ? 'active' : '' }}">
        <a href="{{ url('usuarios/funcionarios') }}"> <i class="fa fa-group"></i> Funcionários </a>
    </li>
@endrole

@role('superadmin')
<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{!! route('categorias.index') !!}"><i class="fa fa-asterisk"></i><span>Categorias</span></a>
</li>

<li class="{{ Request::is('sindicatos*') ? 'active' : '' }}">
    <a href="{!! route('sindicatos.index') !!}"><i class="fa fa-bank"></i><span>Sindicatos</span></a>
</li>
@endrole

