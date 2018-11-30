<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Seu Sindicato - Seus Direitos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Normalize CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css" integrity="sha256-HxaKz5E/eBbvhGMNwhWRPrAR9i/lG1JeT4mD6hCQ7s4=" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="/css/carteirinha.css">

    </head>
    <body>
        <div class="container-geral"> 
            <div class="carteirinha m-3">
                <img id="logo-seu-sindicato" src="/img/logo-seusindicato.jpg">
                <div class="container-infos-sindicato">
                    <div class="container-logo-sindicato">
                        <img src="{{ $carteirinha->sindicato->linkLogo }}" class="img-responsive" align="left">	
                    </div>
                    <h2 class="titulo-sindicato" >{{ $carteirinha->sindicato->nome }}</h3>			
                </div>
                <div class="container-infos-associado">
                    <h3 class="negrito">Associado: {{ strtoupper($carteirinha->name) }}</h3>
                    <h3 class="negrito">RG: {{ $carteirinha->rg }}</h3>
                </div>
                <div class="container-infos-instituicao">
                    <h3 class="negrito">Instituicão: {{ $carteirinha->instituicao->nomecompleto }}</h3>			
                </div>
            </div>
        </div>
    </body>
</html>
