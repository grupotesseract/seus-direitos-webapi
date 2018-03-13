<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $beneficio->id !!}</p>
</div>

<!-- Sindicato Id Field -->
<div class="form-group">
    {!! Form::label('sindicato_id', 'Sindicato Id:') !!}
    <p>{!! $beneficio->sindicato_id !!}</p>
</div>

<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{!! $beneficio->nome !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $beneficio->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $beneficio->updated_at !!}</p>
</div>

