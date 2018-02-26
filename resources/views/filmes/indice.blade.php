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


<!-- INCLUIR CABEÇALHO DO ALAMEDA -->
<!-- AJUSTAR TAMANHO DA IMAGEM -->
<!-- TRADUZIR LABELS -->

<div class="container">
    
    <header class="section" style="margin-top: 25px">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <img src="/img/alameda.png" height="89" width="354" class="logo img-responsive">
            </div>
        </div>
    </header>

    <div class="section" style="margin-top: 100px">
        <div class="row">
            <div class="col-lg-4">
                <p class="text-center">
                    <img src="/img/home-business.png" height="126" width="263">
                </p>
            </div>
            <div class="col-lg-4">
                <p class="text-center">
                    <img src="/img/home-cinema.png" height="126" width="263">
                </p>
            </div>
            <div class="col-lg-4">
                <p class="text-center">
                    <img src="/img/home-servicos.png" height="126" width="263">
                </p>
            </div>
        </div>
    </div>
    
    
</div>

