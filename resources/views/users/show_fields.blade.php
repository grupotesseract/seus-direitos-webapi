<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $user->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome:') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
	{!! Form::label('celular', 'Celular:') !!}
	<p>{!! $user->celular !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
	{!! Form::label('rg', 'RG:') !!}
	<p>{!! $user->rg !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
	{!! Form::label('matricula', 'Matricula:') !!}
	<p>{!! $user->matricula !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
	{!! Form::label('validade_carteirinha', 'Validade da Carteirinha:') !!}
	<p>{!! $user->validade_carteirinha !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
	{!! Form::label('sindicato', 'Sindicato:') !!}
	<p>{!! isset($user->sindicato) ? $user->sindicato->nome : '' !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
	{!! Form::label('instituicao', 'Instituição') !!}
	<p>{!! isset($user->instituicao) ? $user->instituicao->nome : '' !!}</p>
</div>



{{-- <!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{!! $user->password !!}</p>
</div> --}}

<!-- Remember Token Field -->
{{-- <div class="form-group">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{!! $user->remember_token !!}</p>
</div> --}}

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:') !!}
    <p>{!! $user->created_at->format('d/m/Y H:i:s') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Atualizado em:') !!}
    <p>{!! $user->updated_at->format('d/m/Y H:i:s') !!}</p>
</div>

