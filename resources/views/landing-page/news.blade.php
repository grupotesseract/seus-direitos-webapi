@extends('landing-page.partials.app')

@section('css')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection

@section('content')

@include('landing-page.partials.header')

<div class="news-title">
	<div class="content">
		<h1>NOTÍCIAS</h1>
		<a href="/landingpage">
			<h2>&lt; voltar</h2>
		</a>
	</div>
</div>

<div class="news-gallery">
	<div class="content">
		@for ($i = 0; $i < 8; $i++) <div class="news-box">
			<div class="news-image" style="
				background-image: url('https://res.cloudinary.com/tesseract/image/upload/v1570464222/seus-direitos/carteira-de-trabalho-digital_1.jpg');
				background-repeat: no-repeat;
				background-position: center;
				background-size: cover;"></div>

			<div class="news-text">
				<h3>Carteira de Trabalho Digital</h3>
				<p>A partir do dia 24 de setembro de 2019 nós Brasileiros podemos
					contar com a Carteira de Trabalho Digital, disponível para ser baixada
					no seu smartphone.
					A Secretaria de Trabalho do Ministério da Economia diz que a mudança irá proporcionar facilidades para
					trabalhadores e empregados com redução de burocracia e custos.A partir do dia 24 de setembro de 2019 nós
					Brasileiros podemos
					contar com a Carteira de Trabalho Digital, disponível para ser baixada
					no seu smartphone.</p>

				<a href="/landingpage/news/1">
					<h3>LEIA MAIS &gt;</h3>
				</a>
			</div>
	</div> @endfor
</div>
</div>

@endsection