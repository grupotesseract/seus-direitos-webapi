@extends('landing-page.partials.app')

@section('css')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="app-header">
	<div>
		<h4>Sindicato dos Auxiliares Administrativos Escolar de Bauru e Região</h4>
	</div>
</div>

<div class="convencoes-coletivas-header">
	<div>
		<div onclick="window.close();">
		</div>

		<div>
			<h4>CONVENÇÃO COLETIVA DE TRABALHO</h4>
			<h4>OS SEUS DIREITOS ESTÃO AQUI</h4>
			<hr>
		</div>
	</div>
</div>

{{-- <div class="app-pesquisar">
	<div>
		<form method="post" action="">
			{!! csrf_field() !!}
			<i class="fas fa-search"></i>
			<input type="text" name="search" placeholder="BUSCAR">
		</form>
	</div>
</div> --}}

<div class="convencoes-coletivas">
	<div>
		@foreach ($convencoes as $convencao)
		<a class="" href="{{ url('detalhaconvencao/'.$convencao->id) }}">
			<h3>{{$convencao->resumo}}</h3>
		</a>
		@endforeach
	</div>
</div>

<style>
	footer {
		display: none;
	}
</style>

@endsection