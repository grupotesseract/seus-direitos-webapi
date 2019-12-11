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
		<div onclick="window.close();">
		</div>

		<div>
			<h2>NOTÍCIAS</h2>
			<hr>
		</div>

		<div>
		</div>
	</div>
</div>

@foreach ($noticias as $noticia)
@if($loop->iteration % 2 != 0)
<div class="noticias">
	@else
	<div class="noticias noticias-pink">
		@endif
		<div>
				<img src="http://res.cloudinary.com/fernandes/image/upload/{{$noticia->thumbnailid}}.{{$noticia->extensao}}"
					class="" alt="">

				<h3>{{$noticia->manchete}}</h3>

				{!! $noticia->corpo !!}

				<a href="{{ url('detalhanoticia/'.$noticia->id) }}">
					<h3>LEIA MAIS &gt;</h3>
				</a>
		</div>
	</div>
	@endforeach

	<style>
		footer {
			display: none;
		}
	</style>
	@endsection