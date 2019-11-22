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
		</div>

		<div>
			<h4>CONVENÇÃO COLETIVA DE TRABALHO</h4>
			<h4>OS SEUS DIREITOS ESTÃO AQUI</h4>
			<hr>
		</div>
	</div>
</div>

<div class="app-pesquisar"></div>

<div class="convencoes-coletivas">
	<div>
		@foreach ($convencoes as $convencao)
		<div class="">

			<div class="">
				<h4>{{$convencao->resumo}}</h4>
				<a class="" href="{{ url('detalhaconvencao/'.$convencao->id) }}"></a>
			</div>

		</div>
		@endforeach
	</div>
</div>

@endsection