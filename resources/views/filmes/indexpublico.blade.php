@extends('layout-welcome.head')

<style>
    
    .filme {
        margin-top: 20px;
        margin-bottom: 20px;
        padding-top: 30px;
        padding-bottom: 30px;
        border-bottom: 1px solid gray;
    }

    .row {
        margin-left: -15px;
        margin-right: -15px;
    }

    .filme h2, .filme h3 {
        color: #6c6c6c;
        text-transform: uppercase;
    }
</style>


<!-- INCLUIR CABEÇALHO DO ALAMEDA -->
<!-- AJUSTAR TAMANHO DA IMAGEM -->
<!-- TRADUZIR LABELS -->

<div class="container">
    
    @foreach ($filmes as $filme)
        <div class="row filme">
            <div class="col-lg-3">

                <img width="735" height="1089" src="http://res.cloudinary.com/fernandes/image/upload/{{$filme->linkimagem}}.{{$filme->extensao}}" class="img-responsive wp-post-image" alt="1470">

            </div>

            <div class="col-lg-9">
                <h2>{{$filme->nome}}</h2>
                <p>{{$filme->idade}}</p>
                <p>{{$filme->genero}}</p>
                <p>{{$filme->descricao}}</p>
                <a href="{{$filme->trailer}}">Assista o Trailer</a>
            </div>


        </div>
    @endforeach

</div>

