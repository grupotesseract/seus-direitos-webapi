<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Descricao Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descricao', 'Descricao:') !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Loja Field -->
<div class="form-group col-sm-6">
    {!! Form::label('loja', 'Loja:') !!}
    {!! Form::text('loja', null, ['class' => 'form-control']) !!}
</div>

<!-- Observacao Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacao', 'Observacao:') !!}
    {!! Form::textarea('observacao', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('promocaos.index') !!}" class="btn btn-default">Cancel</a>
</div>
