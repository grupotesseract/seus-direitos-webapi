<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $evento->id !!}</p>
</div>

<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{!! $evento->nome !!}</p>
</div>

<!-- Descricao Field -->
<div class="form-group">
    {!! Form::label('descricao', 'Descricao:') !!}
    <p>{!! $evento->descricao !!}</p>
</div>

<!-- Datahora Field -->
<div class="form-group">
    {!! Form::label('datahora', 'Datahora:') !!}
    <p>{!! $evento->datahora !!}</p>
</div>

<!-- Linkimagem Field -->
<div class="form-group">
    {!! Form::label('linkimagem', 'Linkimagem:') !!}
    <p>{!! $evento->linkimagem !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $evento->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $evento->updated_at !!}</p>
</div>

