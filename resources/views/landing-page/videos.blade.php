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

@endsection