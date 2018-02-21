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
    
    <header class="section">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <img src="http://alamedaqualitycenter.com.br/wp-content/themes/alameda/img/logo.png" height="89" width="354" class="logo img-responsive">
            </div>
        </div>
    </header>

    <div class="section" style="margin-top: 30px">
        <div class="row">
            <div class="col-lg-12">
                <p class="text-center">
                    <img src="http://alamedaqualitycenter.com.br/wp-content/themes/alameda/img/logo-cinenfun.png" height="170" width="163">
                </p>
            </div>
        </div>
    </div>
    
    @foreach ($filmes as $filme)
        <div class="row filme">
            <div class="col-lg-3">

                <img width="387" height="512" src="http://res.cloudinary.com/fernandes/image/upload/{{$filme->linkimagem}}.{{$filme->extensao}}" class="img-responsive wp-post-image" alt="">
           

            </div>

            <div class="col-lg-9">
                <h2>{{$filme->nome}}</h2>
                <p>{{$filme->idade}}</p>
                <p>{{$filme->genero}}</p>
                <p>{!! nl2br(e($filme->descricao)) !!}</p>
                
                @if ($filme->trailer)
                    <a href="{{$filme->trailer}}" target="_blank">Assista o Trailer</a>
                @endif
            </div>


        </div>
    @endforeach

</div>

