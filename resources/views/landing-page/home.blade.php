@extends('landing-page.app')

@section('content')
<div class="logo">
    <img src="https://res.cloudinary.com/tesseract/image/upload/v1567982771/seus-direitos/logo-seu-sindicato.png"
        alt="Logo Seu Sindicato">
</div>

<div class="hero">
    <div>
        <h1>O APP</h1>
        <h2>DO TRABALHADOR</h2>
        <h3>Todas as informações sobre sua categoria de trabalho, em um mesmo lugar.</h3>
        <h4>Modernize a forma de comunicação entre o Sindicato e os trabalhadores da categoria.</h4>
        <div class="button"><i class="fab fa-apple"></i>Iphone</div>
        <div class="button"><i class="fab fa-android"></i>Android</div>
    </div>

    <div>
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
    <h1>AINDA NÃO É<br>
        CADASTRADO?</h1>
    <h2>SOLICITE O SEU ACESSO:</h2>
    <h3>canalseusdireitos@gmail.com</h3>

    <h2>Já é cadastrado?</h2>
    <h3>Faça seu login</h3>
    <form method="post" action="{{ url('/login') }}">
        {!! csrf_field() !!}

        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email">
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" class="form-control" name="password" placeholder="senha">
            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>

        <button type="submit" class="submit-button">entrar</button>

        <label>
            <input type="checkbox" name="remember"> lembre-me
        </label>
    </form>
</div>

<div class="menu">

</div>

<div class="video-news">

</div>

<div class="syndicates">

</div>
@endsection