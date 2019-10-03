@extends('landing-page.app')

@section('css')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="header">
	<div class="content">
		<img src="https://res.cloudinary.com/tesseract/image/upload/v1567982771/seus-direitos/logo-seu-sindicato.png"
			alt="Logo Seu Sindicato">
	</div>
</div>

<div class="login">
	<div class="content">
		<div class="login-1">
			<h2>AINDA NÃO É<br>
				CADASTRADO?</h2>
			<p>SOLICITE O SEU ACESSO:</p>
			<p>canalseusdireitos@gmail.com</p>
		</div>

		<div class="login-2">
			<h2>Já é cadastrado?</h2>
			<p>Faça seu login</p>
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
</div>

@endsection