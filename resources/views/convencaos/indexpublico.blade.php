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
    
    @foreach ($convencoes as $convencao)
        <div class="row filme">

            <div class="col-lg-12">
                <h2>{{$convencao->resumo}}</h2>    
                <a class="btn btn-primary pull-left" href="{{ url('downloadconvencao/'.$convencao->id) }}">Fazer Download</a>    
            </div>

        </div>
    @endforeach

</div>

