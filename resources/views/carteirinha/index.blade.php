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

        <link rel="stylesheet" href="/css/carteirinha.css?v={{time()}}">
        <link rel="manifest" href="/carteirinha/manifest.json">

    </head>
    <body>
        <div class="container-geral"> 
            <div class="carteirinha m-1">
                <div class="container-logo-seu-sindicato">
                    <img id="logo-seu-sindicato" src="/img/logo-seusindicato-transparencia.png">
                    <div class="msg-troque-orientacao">
                        <p> ROTACIONE SEU DISPOSITIVO</p>
                    </div>
                    <div class="textobottom">
                        <div class="fundo-azul-claro"></div>
                        <p> PRESENTE<br>NA SUA VIDA</p>
                    </div>
                </div>
                <div class="container-resto">
                    <div class="container-infos-sindicato">
                        <div class="container-logo-sindicato">
                            <img src="{{ $carteirinha['logoSindicato'] }}" class="img-responsive" align="left">	
                        </div>
                        <div class="container-texto-sindicato">
                            <h2 class="negrito titulo-sindicato" >{{ $carteirinha['nomeSindicato'] }}</h3>			
                        </div>
                    </div>
                    <div>
                        <div class="text-left mb-2">
                            <span class="label-info-carteirinha ">
                                Associado
                            </span>
                            <span class="text-left">
                                {{ $carteirinha['nomeAssociado'] }}
                            </span>
                        </div>
                        <div class="text-left mb-2">
                            <span class="label-info-carteirinha ">
                                RG
                            </span>
                            <span class="text-left">
                                &nbsp;{{  $carteirinha['rgAssociado'] }}
                            </span>

                        </div>
                        <div class="text-left mb-2">
                            <span class="label-info-carteirinha ">
                                Instituição
                            </span>
                            <span class="text-left"> 
                                {{  $carteirinha['nomeInstituicao']  }}
                            </span>
                        </div>
                        <div class="text-left mb-2">
                            <span class="label-info-carteirinha ">
                                Validade
                            </span>
                            <span class="text-left"> 
                                {{  $carteirinha['validade_carteirinha']  }}
                            </span>
                        </div>
                        <div class="text-left mb-2">
                            <span class="label-info-carteirinha ">
                                Matrícula
                            </span>
                            <span class="text-left"> 
                                {{  $carteirinha['matricula']  }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            screen.orientation.lock('landscape');
        </script>
    </body>
</html>
