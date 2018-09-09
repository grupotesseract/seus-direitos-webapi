<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $instituicao->id !!}</p>
</div>

<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{!! $instituicao->nome !!}</p>
</div>

<!-- Nomecompleto Field -->
<div class="form-group">
    {!! Form::label('nomecompleto', 'Nomecompleto:') !!}
    <p>{!! $instituicao->nomecompleto !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $instituicao->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $instituicao->updated_at !!}</p>
</div>

