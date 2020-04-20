@extends('landing-page.partials.app')

@section('css')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="app-header">
	<div>
		<h4>{{$sindicato->nome}}</h4>
	</div>
</div>

<div class="noticias-header">
	<div>
		<div onclick="setTimeout(window.close, 300);">
		</div>

		<div>
			<h2>NOTÍCIAS</h2>
			<hr>
		</div>

		<img src="https://res.cloudinary.com/tesseract/image/upload/v1575653723/seus-direitos/icone-noticia.png" alt="Ícone Nótícias">
	</div>
</div>

@foreach ($noticias as $noticia)
@if($loop->iteration % 2 != 0)
<div class="noticias">
	@else
	<div class="noticias noticias-pink">
		@endif
		<div>
			<img src="http://res.cloudinary.com/fernandes/image/upload/{{ $noticia->thumbnailid }}.{{ $noticia->extensao }}"
				alt="{{$noticia->thumbnailid}}">

			<h3>{{ $noticia->manchete }}</h3>

			{!! $noticia->corpo !!}

			<a href="{{ url('detalhanoticia/'.$noticia->id) }}">
				<h3>LEIA MAIS &gt;</h3>z
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