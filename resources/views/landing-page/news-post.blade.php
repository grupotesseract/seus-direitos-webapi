@extends('landing-page.partials.app')

@section('css')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection

@section('content')

@include('landing-page.partials.header')

<div class="news-post-title">
	<div class="content">
		<h1>{{$noticiasLanding->titulo}}</h1>
		<a href="javascript:history.back()">
			<h2>&lt; voltar</h2>
		</a>
	</div>
	
	<h3>{{$noticiasLanding->created_at->format('d-m-Y')}}</h3>
</div>

<div class="news-post-image">
	<div class="content">
		<div class="image" style="
				background-image: url('http://res.cloudinary.com/fernandes/image/upload/{{$noticiasLanding->imagem}}.{{$noticiasLanding->extensao}}');
				background-repeat: no-repeat;
				background-position: center;
				background-size: cover;"></div>
	</div>
</div>

<div class="news-post-text">
	<div class="content">
		<div class="text">
			{!! $noticiasLanding->texto !!}
		</div>
	</div>
</div>

@endsection