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

<div class="container" style="margin-right: 100px">
    
    <div class="row filme">
        <div class="col-lg-12">
            <img style="margin-right: 100px" src="http://res.cloudinary.com/fernandes/image/upload/{{$noticia->thumbnailid}}.{{$noticia->extensao}}" class="img-responsive wp-post-image" alt="">          
        </div>

        <div class="col-lg-9">
            <h2>{{$noticia->manchete}}</h2>                
        </div>

        <div class="col-lg-12">
            {!! $noticia->corpo !!}                
        </div>

    </div>

</div>

