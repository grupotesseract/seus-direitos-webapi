@extends('layout-welcome.head')

<style>
    
    .filme {
        margin-top: 20px;
        margin-bottom: 20px;
        padding-top: 30px;
        padding-bottom: 30px;
        border-bottom: 1px solid gray;
    }

    

    .filme h2, .filme h3 {
        color: #6c6c6c;
        text-transform: uppercase;
    }

    .img-responsive, .thumbnail > img, .thumbnail a > img, .carousel-inner > .item > img, .carousel-inner > .item > a > img {
        display: block;
        max-width: 100%;
        height: auto;
        horizontal-align: middle;

    }

    .logo {
        margin: 0 auto;
    }

    .text-center {
        text-align: center;
    }

    p {
        margin: 0 0 10px;
    }

    .section {
        position: relative;
    }

    img {
        vertical-align: middle;
    }

    body {
        font-family: 'Hind', sans-serif;
    }
    
</style>

<div class="container" style="height:100%; background-color: #eae4dd">
    
    <header class="section" style="margin-top: 25px">
        <div class="row">
            <div class="col-lg-4">
                <img src="/img/alameda.png" height="89" width="354" class="logo img-responsive">
            </div>
        </div>
    </header>

    <div class="section" style="margin-top: 40px">
        <div class="row">
            <div class="col-xs-12">     
                <p class="text-center">
                    <a href="alameda/filmes">
                        <img src="/img/home-cinema.png" height="126" width="126">
                    </a>
                </p>
            </div>
            <div class="col-xs-6">
                <p class="text-center">
                    <img src="/img/home-eventos.png" style="opacity: 0.4;filter: alpha(opacity=40);" height="126" width="126">
                </p>
            </div>
            <div class="col-xs-6">
                <p class="text-center">
                    <img src="/img/home-promocoes.png" style="opacity: 0.4;filter: alpha(opacity=40);" height="126" width="126">
                </p>
            </div>
        </div>
    </div>
    
    
</div>

