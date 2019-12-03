<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $convencao->id !!}</p>
</div>

<!-- Resumo Field -->
<div class="form-group">
    {!! Form::label('resumo', 'Resumo:') !!}
    <p>{!! $convencao->resumo !!}</p>
</div>

<!-- Arquivo Field -->
<div class="form-group">
    {!! Form::label('arquivo', 'Arquivo:') !!}
    <p>{!! $convencao->arquivo !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
	{!! Form::label('created_at', 'Criado em:') !!}
	<p>{!! $convencao->created_at->format('d/m/Y H:i:s') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
	{!! Form::label('updated_at', 'Atualizado em:') !!}
	<p>{!! $convencao->updated_at->format('d/m/Y H:i:s') !!}</p>
</div>

