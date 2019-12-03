<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $categoria->id !!}</p>
</div>

<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{!! $categoria->nome !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:') !!}
    <p>{!! $categoria->created_at->format('d/m/Y H:i:s') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Atualizado em:') !!}
    <p>{!! $categoria->updated_at->format('d/m/Y H:i:s') !!}</p>
</div>



