<div class="logo-home">
	<div class="content">
		<a href="/">
			<img src="https://res.cloudinary.com/tesseract/image/upload/v1571013539/seus-direitos/logo-seu-sindicato.png"
				alt="Logo Seu Sindicato">
		</a>
	</div>
</div>

<div class="login-home">
	<div class="navigation-home">
		<a href="/landingpage/videos">
			<h2>VÍDEOS</h2>
		</a>

		<a href="/landingpage/news">
			<h2>NOTÍCIAS</h2>
		</a>
	</div>

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
					<input type="password" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}" name="password"
						placeholder="senha">
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

<div class="hero-home">
	<div class="content">
		<div class="hero-1">
			<h1>O APP</h1>
			<h2>DO TRABALHADOR</h2>
			<h3>Todas as informações sobre<br>
				sua categoria de trabalho,<br>
				em um mesmo lugar.</h3>
			<h4>Modernize a forma de comunicação entre o<br>
				Sindicato e os trabalhadores da categoria.</h4>
			<div class="button"><a href="https://apps.apple.com/br/app/seus-direitos/id1388142302" target="_blank"><i
						class="fab fa-apple"></i>Iphone</a></div>
			<div class="button"><a href="https://play.google.com/store/apps/details?id=com.seusdireitos2" target="_blank"><i
						class="fab fa-android"></i>Android</a></div>
		</div>

		<div class="hero-2">
			<img src="https://res.cloudinary.com/tesseract/image/upload/v1568925429/seus-direitos/mao-app.png"
				alt="Mockup Seu Sindicato">
		</div>

		<div class="hero-3">
			<h4>VEJA AS CONVENÇÕES<br>
				COLETIVAS DA SUA<br>
				CATEGORIA</h4>
			<h4>LEIA NOTÍCIAS</h4>
			<h4>CONHEÇA BENEFÍCIOS</h4>
			<h4>FALE COM<br>
				REPRESENTANTES<br>
				DA SUA CATEGORIA</h4>
			<h4>UTILIZE A<br>
				CARTEIRINHA VIRTUAL</h4>
		</div>
	</div>
</div>