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
		<div>
			<a href=""></a>
		</div>

		<div>
			<h4>CONVENÇÃO COLETIVA DE TRABALHO</h4>
			<h4>OS SEUS DIREITOS ESTÃO AQUI</h4>
			<hr>
		</div>
	</div>
</div>

<div class="convencoes-coletivas-interno">
	<div>
		<h3>{{$convencao->resumo}}</h3>

		{!! $convencao->texto !!}
	</div>
</div>

<style>
	footer {
		display: none;
	}
</style>

@endsection
