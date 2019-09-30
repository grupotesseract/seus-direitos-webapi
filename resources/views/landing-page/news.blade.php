@extends('landing-page.app')

@section('content')


<section class="header-subpage">
    <div class="logo-subpage">
        <img src="https://res.cloudinary.com/tesseract/image/upload/v1567982771/seus-direitos/logo-seu-sindicato.png"
            alt="Logo Seu Sindicato">
    </div>

    <div class="login-subpage">
        <div class="login-container">
            <div class="login-1">
                <h1>AINDA NÃO É<br>
                    CADASTRADO?</h1>
                <h2>SOLICITE O SEU ACESSO:</h2>
                <h3>canalseusdireitos@gmail.com</h3>
            </div>

            <div class="login-2">
                <h1>Já é cadastrado?</h1>
                <h3>Faça seu login</h3>
            </div>

            <div class="login-3">
                <form method="post" action="{{ url('/login') }}">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        <input type="email" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}"
                            name="email" value="{{ old('email') }}" placeholder="email">
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
    </div>
</section>

@endsection