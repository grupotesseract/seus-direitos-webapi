@extends('landing-page.app')

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
			<iframe src="https://www.youtube.com/embed/LXb3EKWsInQ">
			</iframe>

			<h3>MAIS VÍDEOS ></h3>
		</div>

		<div class="news">
			<div class="news-image"></div>

			<div class="news-text">
				<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
					dolore magna aliqua.</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
					dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
					ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
					fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
					deserunt mollit anim id est laborum.</p>
				<h3>LEIA MAIS ></h3>
			</div>
		</div>
	</div>
</div>

<div class="syndicates">
	<h2>
		<span>visite o site dos</span><br>
		SINDICATOS<br>
		BENEFICIADOS <span class="arrow">&gt;</span></h2>

	<img src="https://res.cloudinary.com/tesseract/image/upload/v1570499371/seus-direitos/sindicato-sintshogastro.png"
		alt="SINTSHOGASTRO - SCR">
	<img src="https://res.cloudinary.com/tesseract/image/upload/v1570495756/seus-direitos/sindicato-sitteemare.png"
		alt="SITTEEMARE">
	<img src="https://res.cloudinary.com/tesseract/image/upload/v1570495756/seus-direitos/sindicato-saae.png" alt="SAAE">
</div>
@endsection