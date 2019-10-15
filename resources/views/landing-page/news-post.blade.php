@extends('landing-page.partials.app')

@section('css')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection

@section('content')

@include('landing-page.partials.header')

<div class="news-post-title">
	<div class="content">
		<h1>Carteira de Trabalho Digital</h1>
		<a href="/landingpage">
			<h2>&lt; voltar</h2>
		</a>
	</div>
	
	<h3>13.08.2019</h3>
</div>

<div class="news-post-image">
	<div class="content">
		<div class="image" style="
				background-image: url('https://res.cloudinary.com/tesseract/image/upload/v1570464222/seus-direitos/carteira-de-trabalho-digital_1.jpg');
				background-repeat: no-repeat;
				background-position: center;
				background-size: cover;"></div>
	</div>
</div>

<div class="news-post-text">
	<div class="content">
		<div class="text">
			<p>A partir do dia 24 de setembro de 2019 nós Brasileiros podemos
				contar com a Carteira de Trabalho Digital, disponível para ser baixada
				no seu smartphone.</p>

			<p>A Secretaria de Trabalho do Ministério da Economia diz que a mudança irá proporcionar facilidades para
				trabalhadores e empregados com redução de burocracia e custos.A partir do dia 24 de setembro de 2019 nós
				Brasileiros podemos
				contar com a Carteira de Trabalho Digital, disponível para ser baixada
				no seu smartphone.</p>
		</div>
	</div>
</div>

@endsection