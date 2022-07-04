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
                &nbsp; Associados
            </a>
				</li>
				<li class="{{ Request::is('usuarios/funcionarios') ? 'active' : '' }}">
						<a href="{{ url('trashed/usuarios/funcionarios') }}">
								&nbsp; Associados Excluídos
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
		<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
			<a href="{!! route('categorias.index') !!}"><i class="fa fa-asterisk"></i><span>Categorias</span></a>
		</li>
		
		<li class="{{ Request::is('usuarios/funcionarios') ? 'active' : '' }}">
        <a href="{{ url('usuarios/funcionarios') }}"> <i class="fa fa-group"></i> Associados </a>
		</li>
		
		<li class="{{ Request::is('usuarios/funcionarios') ? 'active' : '' }}">
			<a href="{{ url('trashed/usuarios/funcionarios') }}"> <i class="fa fa-group"></i> Associados Excluídos</a>
		</li>
		
@endrole

@role('superadmin')


<li class="{{ Request::is('sindicatos*') ? 'active' : '' }}">
    <a href="{!! route('sindicatos.index') !!}"><i class="fa fa-bank"></i><span>Sindicatos</span></a>
</li>

<li class="{{ Request::is('trashed/sindicatos*') ? 'active' : '' }}">
	<a href="{!! url('trashed/sindicatos') !!}"><i class="fa fa-bank"></i><span>Sindicatos Excluídos</span></a>
</li>


<li class="{{ Request::is('filmes*') ? 'active' : '' }}">
    <a href="{!! route('filmes.index') !!}"><i class="fa fa-film"></i><span>Filmes</span></a>
</li>

<li class="{{ Request::is('eventos*') ? 'active' : '' }}">
    <a href="{!! route('eventos.index') !!}"><i class="fa fa-calendar"></i><span>Eventos</span></a>
</li>

<li class="{{ Request::is('promocaos*') ? 'active' : '' }}">
    <a href="{!! route('promocaos.index') !!}"><i class="fa fa-gift"></i><span>Promoções</span></a>
</li>

<li class="{{ Request::is('beneficios*') ? 'active' : '' }}">
    <a href="{!! route('beneficios.index') !!}"><i class="fa fa-pagelines"></i><span>Benefícios</span></a>
</li>

<li class="{{ Request::is('videos*') ? 'active' : '' }}">
    <a href="{!! route('videos.index') !!}"><i class="fa fa-play"></i><span>Videos</span></a>
</li>

<li class="{{ Request::is('propagandas*') ? 'active' : '' }}">
    <a href="{!! route('propagandas.index') !!}"><i class="fa fa-image"></i><span>Propagandas</span></a>
</li>

<li class="{{ Request::is('instituicaos*') ? 'active' : '' }}">
    <a href="{!! route('instituicaos.index') !!}"><i class="fa fa-building"></i><span>Instituições</span></a>
</li>

<li class="{{ Request::is('convencaos*') ? 'active' : '' }}">
    <a href="{!! route('convencaos.index') !!}"><i class="fa fa-calendar-check-o"></i><span>Convenções Coletivas</span></a>
</li>

<li class="{{ Request::is('noticias*') ? 'active' : '' }}">
    <a href="{!! route('noticias.index') !!}"><i class="fa fa-bullhorn"></i><span>Notícias</span></a>
</li>

<li class="treeview">
	<a href="#">
			<i class="fa fa-group"></i>
			<span>Landing Page</span>
			<i class="fa fa-angle-left pull-right"></i>
	</a>
	
	<ul class="treeview-menu">
		<li class="{{ Request::is('noticiasLandings*') ? 'active' : '' }}">
			<a href="{!! route('noticiasLandings.index') !!}"><i class="fa fa-edit"></i><span>Noticias</span></a>
		</li>

		<li class="{{ Request::is('videosLandings*') ? 'active' : '' }}">
			<a href="{!! route('videosLandings.index') !!}"><i class="fa fa-edit"></i><span>Videos</span></a>
		</li>
	</ul>


</li>

@endrole


@role('sindicalista')
<li class="{{ Request::is('beneficios*') ? 'active' : '' }}">
    <a href="{!! route('beneficios.index') !!}"><i class="fa fa-pagelines"></i><span>Benefícios</span></a>
</li>

<li class="{{ Request::is('convencaos*') ? 'active' : '' }}">
    <a href="{!! route('convencaos.index') !!}"><i class="fa fa-calendar-check-o"></i><span>Convenções Coletivas</span></a>
</li>

<li class="{{ Request::is('noticias*') ? 'active' : '' }}">
    <a href="{!! route('noticias.index') !!}"><i class="fa fa-bullhorn"></i><span>Notícias</span></a>
</li>

<li class="{{ Request::is('faleConoscos*') ? 'active' : '' }}">
    <a href="{!! route('faleConoscos.index') !!}"><i class="fa fa-envelope"></i><span>Fale Conosco</span></a>
</li>

<li class="{{ Request::is('instituicaos*') ? 'active' : '' }}">
    <a href="{!! route('instituicaos.index') !!}"><i class="fa fa-building"></i><span>Instituições</span></a>
</li>

@endrole
