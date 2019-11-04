@extends('landing-page.partials.app')

@section('css')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection

@section('content')

@include('landing-page.partials.header-home')

<div class="menu">
	<h2>O QUE VOCÊ<br>
		ENCONTRA LÁ<br>
		DENTRO DO APP:</h2>

	<img src="https://res.cloudinary.com/tesseract/image/upload/v1570496219/seus-direitos/icone-convencoes-coletivas.png"
		alt="Conveções Coletivas">
	<img src="https://res.cloudinary.com/tesseract/image/upload/v1570496219/seus-direitos/icone-noticias.png"
		alt="Notícias">
	<img src="https://res.cloudinary.com/tesseract/image/upload/v1570496219/seus-direitos/icone-beneficios.png"
		alt="Benefícios">
	<img src="https://res.cloudinary.com/tesseract/image/upload/v1570496219/seus-direitos/icone-colonia-de-ferias.png"
		alt="Colônia de Férias">
	<img src="https://res.cloudinary.com/tesseract/image/upload/v1570496219/seus-direitos/icone-concorra-a-premios.png"
		alt="Concorra a Prêmios">
</div>

<div class="video-news">
	<div class="content">
		<div class="video">
			{{-- <iframe width="360" height="315" src="https://www.youtube.com/embed/LXb3EKWsInQ"> --}}
			@isset($videoLanding)
				<iframe src="https://www.youtube.com/embed/{{ $videoLanding->codigo_video }}">
				</iframe>

				<a href="/landingpage/videos">
					<h3>MAIS VÍDEOS &gt;</h3>
				</a>
					
			@endisset
		</div>

		<div class="news">
			@isset($noticiaLanding)
				<div class="news-image" style="
				background-image: url('http://res.cloudinary.com/fernandes/image/upload/{{$noticiaLanding->imagem}}.{{$noticiaLanding->extensao}}');
				background-repeat: no-repeat;
				background-position: center;
				background-size: cover;"></div>

				<div class="news-text">
					<h3>{{ $noticiaLanding->titulo }}</h3>
						{!! $noticiaLanding->texto !!}

				<a href="/landingpage/news/{{$noticiaLanding->id}}">
							<h3>LEIA MAIS &gt;</h3>
						</a>
				</div>

				<a href="/landingpage/news">
					<h3>MAIS NOTÍCIAS &gt;</h3>
				</a>					
			@endisset
		</div>
	</div>
</div>

<div class="syndicates">
	<h2>
		<span>visite o site dos</span><br>
		SINDICATOS<br>
		JÁ CADASTRADOS <span class="arrow">&gt;</span></h2>

	<a href="https://www.sintshogastro.org.br" target="_blank">
		<img src="https://res.cloudinary.com/tesseract/image/upload/v1570499371/seus-direitos/sindicato-sintshogastro.png"
			alt="SINTSHOGASTRO - SCR">
	</a>
	<a href="https://www.sinteemar.com.br" target="_blank">
		<img
			src="https://res.cloudinary.com/tesseract/image/upload/v1570538595/seus-direitos/WhatsApp_Image_2019-10-04_at_17.17.34.jpg"
			alt="SITTEEMARE">
	</a>
	<a href="http://www.saaebauru.com.br/do/Home" target="_blank">
		<img src="https://res.cloudinary.com/tesseract/image/upload/v1570495756/seus-direitos/sindicato-saae.png"
			alt="SAAE">
	</a>
</div>
@endsection