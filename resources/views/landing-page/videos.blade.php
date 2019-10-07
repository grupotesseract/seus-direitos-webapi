@extends('landing-page.app')

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
		@for ($i = 0; $i < 6; $i++)
			<div class="video-box">
				<iframe src="https://www.youtube.com/embed/LXb3EKWsInQ">
				</iframe>

				<div class="text">
					<h2>{{ $i }} TÍTULO DO VIDEO</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
						dolore magna aliqua. Ut enim ad minim veniam.</p>
				</div>
			</div>
		@endfor
	</div>
</div>

@endsection