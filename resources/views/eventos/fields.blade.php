<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Descricao Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descricao', 'Descrição:') !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Datahora Field -->
<div class="form-group col-sm-6">
    {!! Form::label('datahora', 'Data e Hora:') !!}
    {!! Form::text('datahora', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Imagem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cartaz', 'Imagem:') !!}
    {!! Form::file('cartaz', null) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('eventos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
