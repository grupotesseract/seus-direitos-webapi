@extends('landing-page.partials.app')

@section('css')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection

@section('content')

@include('landing-page.partials.header')

<div class="videos-title">
	<div class="content">
		<h1>VÍDEOS</h1>
		
		<a href="/landingpage">
			<h2>&lt; voltar</h2>
		</a>
	</div>
</div>

<div class="videos-gallery">
	<div class="content">
		
		@foreach ($videosLanding as $videoLanding)
			<div class="video-box">
				<iframe src="https://www.youtube.com/embed/{{ $videoLanding->codigo_video }}">
				</iframe>

				<div class="text">
					<h2>{{ $videoLanding->titulo }}</h2>
					<p>{{ $videoLanding->descricao }}</p>
				</div>
			</div>	
		@endforeach		
		
	</div>
</div>

@endsection