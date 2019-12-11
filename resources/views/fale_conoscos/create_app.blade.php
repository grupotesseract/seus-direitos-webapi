@extends('landing-page.partials.app')

@section('css')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="app-header">
	<div>
		<h4>Sindicato dos Auxiliares Administrativos Escolar de Bauru e Região</h4>
	</div>
</div>

<div class="fale-conosco-header">
	<div>
		<div>
			<a href="/sindicatos/1/noticias"></a>
		</div>

		<div>
			<h2>FALE CONOSCO</h2>
			<hr>
		</div>

		<div>
		</div>
	</div>
</div>

<div class="fale-conosco">
	<div>
		<h3>Alguma dúvida, sugestão ou crítica?<br>Escreva para nós.</h3>

		{!! Form::open(['route' => 'faleConoscos.store']) !!}

		{{-- @include('fale_conoscos.fields') --}}

		<div class="form-group">
			@if ($errors->has('assunto'))
			<span class="help-block">
				<strong>{{ $errors->first('assunto') }}</strong>
			</span>
			@endif
			<input type="text" class="form-control {{ $errors->has('assunto') ? ' has-error' : '' }}" name="assunto"
				placeholder="ASSUNTO">
		</div>

		<div class="form-group">
			@if ($errors->has('texto'))
			<span class="help-block">
				<strong>{{ $errors->first('texto') }}</strong>
			</span>
			@endif
			<textarea type="text" rows="6" class="form-control {{ $errors->has('texto') ? ' has-error' : '' }}" name="texto"
				placeholder="TEXTO"></textarea>
		</div>

		<p>Para podermos respondê-lo,<br>deixe seu contato:</p>

		<div class="form-group">
			@if ($errors->has('email'))
			<span class="help-block">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
			<input type="email" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" name="email"
				placeholder="EMAIL">
		</div>

		<div class="form-group">
			@if ($errors->has('telefone'))
			<span class="help-block">
				<strong>{{ $errors->first('telefone') }}</strong>
			</span>
			@endif
			<input type="text" class="form-control {{ $errors->has('telefone') ? ' has-error' : '' }}" name="telefone"
				placeholder="TELEFONE">
		</div>

		{!! Form::hidden('sindicato_id', $sindicato->id) !!}

		<button type="submit" class="submit-button">ENVIAR</button>

		{!! Form::close() !!}
	</div>
</div>

<style>
	footer {
		display: none;
	}
</style>
@endsection