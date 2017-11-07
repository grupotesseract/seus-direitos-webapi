<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{!! route('categorias.index') !!}"><i class="fa fa-edit"></i><span>Categorias</span></a>
</li>

<li class="{{ Request::is('sindicatos*') ? 'active' : '' }}">
    <a href="{!! route('sindicatos.index') !!}"><i class="fa fa-edit"></i><span>Sindicatos</span></a>
</li>

