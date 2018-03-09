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

<!-- Loja Field -->
<div class="form-group col-sm-6">
    {!! Form::label('loja', 'Loja:') !!}
    {!! Form::text('loja', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Observacao Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacao', 'Observação:') !!}
    {!! Form::textarea('observacao', null, ['class' => 'form-control']) !!}
</div>

<!-- Imagem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cartaz', 'Imagem:') !!}
    {!! Form::file('cartaz', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('promocaos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
