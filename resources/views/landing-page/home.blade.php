@extends('landing-page.app')

@section('content')

<section class="header">
    <div class="logo">
        <img src="https://res.cloudinary.com/tesseract/image/upload/v1567982771/seus-direitos/logo-seu-sindicato.png"
            alt="Logo Seu Sindicato">
    </div>

    <div class="hero">
        <div class="hero-1">
            <h1>O APP</h1>
            <h2>DO TRABALHADOR</h2>
            <h3>Todas as informações sobre sua categoria de trabalho, em um mesmo lugar.</h3>
            <h4>Modernize a forma de comunicação entre o Sindicato e os trabalhadores da categoria.</h4>
            <div class="button"><i class="fab fa-apple"></i>Iphone</a></div>
            <div class="button"><i class="fab fa-android"></i>Android</div>
        </div>
    
        <div class="hero-2">
            <img src="https://res.cloudinary.com/tesseract/image/upload/v1568925429/seus-direitos/mao-app.png"
                alt="Mockup Seu Sindicato">
        </div>
    
        <div class="hero-3">
            <h3>LEIA NOTÍCIAS</h3>
            <h3>CONHEÇA BENEFÍCIOS</h3>
            <h3>FALE COM<br>
                REPRESENTANTES<br>
                DA SUA CATEGORIA</h3>
            <h3>UTILIZE A<br>
                CARTEIRINHA VIRTUAL</h3>
        </div>
    </div>
    
    <div class="login">
        <div class="login-container">
            <h1>AINDA NÃO É<br>
                CADASTRADO?</h1>
            <h2>SOLICITE O SEU ACESSO:</h2>
            <h3>canalseusdireitos@gmail.com</h3>
    
            <h2>Já é cadastrado?</h2>
            <h3>Faça seu login</h3>
            <form method="post" action="{{ url('/login') }}">
                {!! csrf_field() !!}
    
                <div class="form-group">
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    <input type="email" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" name="email"
                        value="{{ old('email') }}" placeholder="email">
                </div>
    
                <div class="form-group">
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    <input type="password" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}"
                        name="password" placeholder="senha">
                </div>
    
                <button type="submit" class="submit-button">entrar</button>
    
                <label>lembre-me
                    <input type="checkbox" name="remember">
                    <span class="checkmark"></span>
                </label>
            </form>
        </div>
    </div>
</section>

<div class="menu">
    <img src="https://res.cloudinary.com/tesseract/image/upload/v1570464503/seus-direitos/%C3%8Dcones_Landing_Page_SS-09.png"
        alt="Convenções Coletivas">
    <img src="https://res.cloudinary.com/tesseract/image/upload/v1570464500/seus-direitos/%C3%8Dcones_Landing_Page_SS-10.png"
        alt="Notícias">
    <img src="https://res.cloudinary.com/tesseract/image/upload/v1570464498/seus-direitos/%C3%8Dcones_Landing_Page_SS-11.png"
        alt="Benefícios">
    <img src="https://res.cloudinary.com/tesseract/image/upload/v1570464496/seus-direitos/%C3%8Dcones_Landing_Page_SS-12.png"
        alt="Colônia de Férias">
    <img src="https://res.cloudinary.com/tesseract/image/upload/v1570464505/seus-direitos/%C3%8Dcones_Landing_Page_SS_Prancheta_14.png"
        alt="Concorra a Prêmios">
</div>

<div class="video-news">
    <div class="video">
        {{-- <iframe width="360" height="315" src="https://www.youtube.com/embed/LXb3EKWsInQ"> --}}
        <iframe src="https://www.youtube.com/embed/3mGKzUxYeFY">
        </iframe>

        {{-- <h3>MAIS VÍDEOS ></h3> --}}
    </div>

    <div class="news">
        <div class="news-image"></div>

        <div class="news-text">
            <h3>A partir do dia 24 de setembro de 2019 nós Brasileiros podemos 
                contar com a Carteira de Trabalho Digital, disponível para ser baixada 
                no seu smartphone.</h3>
            <p>A Secretaria de Trabalho do Ministério da Economia diz que a mudança irá proporcionar facilidades para trabalhadores e empregados com redução de burocracia e custos.</p>
            {{-- <h3>LEIA MAIS ></h3> --}}
        </div>
    </div>
</div>

<div class="syndicates">
    <h2>SINDICATOS<br>
        BENEFICIADOS</h2>

    <div class="syndicate"></div>
    <div class="syndicate"></div>
    <div class="syndicate"></div>
    <div class="syndicate"></div>
    <div class="syndicate"></div>
</div>
@endsection