@extends('landing-page.partials.app')

@section('css')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection

@section('content')

@include('landing-page.partials.header')

<div class="news-title">
	<div class="content">
		<h1>NOTÍCIAS</h1>
		<a href="/">
			<h2>&lt; voltar</h2>
		</a>
	</div>
</div>

<div class="news-gallery">
	<div class="content">
		@foreach ($noticiasLanding as $noticiaLanding)
			<div class="news-box">
				<div class="news-image" style="
					background-image: url('http://res.cloudinary.com/fernandes/image/upload/{{$noticiaLanding->imagem}}.{{$noticiaLanding->extensao}}');
					background-repeat: no-repeat;
					background-position: center;
					background-size: cover;"></div>

				<div class="news-text">
					<h3>{{ $noticiaLanding->titulo }}</h3>
					{!! $noticiaLanding->texto !!}
				<a href="/landingpage/news/{{ $noticiaLanding->id }}">
						<h3>LEIA MAIS &gt;</h3>
					</a>
				</div>
		</div>				
		@endforeach
</div>
</div>

@endsection