@extends('landing-page.app')

@section('content')

@include('landing-page.header')

<div class="title-news">
    <h1>NOTÍCIAS</h1>
    <a href="/landingpage">
        <h2>< voltar</h2>
    </a>
</div>

<div class="news-gallery">
    @for ($i = 0; $i < 10; $i++)
        <div class="news-box">
            <div class="news-image"></div>

            <div class="news-text">
                <h3>{{ $i }} Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.</p>
                <h3>LEIA MAIS ></h3>
            </div>
        </div>
    @endfor
</div>

@endsection