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

<div class="noticias-header">
	<div>
		<div>
			<a href="/sindicatos/1/noticias"></a>
		</div>

		<div>
			<h2>NOTÍCIAS</h2>
			<hr>
		</div>

		<div>
		</div>
	</div>
</div>

<div class="noticias-interno">
	<div>
		<img src="http://res.cloudinary.com/fernandes/image/upload/{{ $noticia->thumbnailid }}.{{ $noticia->extensao }}"
			alt="{{ $noticia->thumbnailid }}">

		<h3>{{ $noticia->manchete }}</h3>

		{!! $noticia->corpo !!}
	</div>
</div>

<style>
	footer {
		display: none;
	}
</style>
@endsection