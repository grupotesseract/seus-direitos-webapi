<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome Abreviado:') !!}
    <p>{!! $instituicao->nome !!}</p>
</div>

<!-- Nomecompleto Field -->
<div class="form-group">
    {!! Form::label('nomecompleto', 'Nome Completo:') !!}
    <p>{!! $instituicao->nomecompleto !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:') !!}
    <p>{!! $instituicao->created_at->format('d/m/Y H:i:s') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Atualizado em:') !!}
    <p>{!! $instituicao->updated_at->format('d/m/Y H:i:s') !!}</p>
</div>

