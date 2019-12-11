<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $faleConosco->id !!}</p>
</div>

<!-- Assunto Field -->
<div class="form-group">
    {!! Form::label('assunto', 'Assunto:') !!}
    <p>{!! $faleConosco->assunto !!}</p>
</div>

<!-- Texto Field -->
<div class="form-group">
    {!! Form::label('texto', 'Texto:') !!}
    <p>{!! $faleConosco->texto !!}</p>
</div>

<!-- email Field -->
<div class="form-group">
	{!! Form::label('email', 'Email:') !!}
	<p>{!! $faleConosco->email !!}</p>
</div>

<!-- Telefone Field -->
<div class="form-group">
	{!! Form::label('telefone', 'Telefone:') !!}
	<p>{!! $faleConosco->telefone !!}</p>
</div>

<!-- Sindicato Id Field -->
<div class="form-group">
    {!! Form::label('sindicato_id', 'Sindicato:') !!}
    <p>{!! $faleConosco->sindicato->nome !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:') !!}
    <p>{!! $faleConosco->created_at->format('d/m/Y H:i:s') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Atualizado em:') !!}
    <p>{!! $faleConosco->updated_at->format('d/m/Y H:i:s') !!}</p>
</div>

