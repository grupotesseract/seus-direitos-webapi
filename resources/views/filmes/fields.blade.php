<!-- Imagem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cartaz', 'Imagem Cartaz:') !!}
    {!! Form::file('cartaz', null) !!}
</div>

<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Idade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idade', 'Idade:') !!}
    {!! Form::text('idade', null, ['class' => 'form-control']) !!}
</div>

<!-- Genero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('genero', 'Genero:') !!}
    {!! Form::text('genero', null, ['class' => 'form-control']) !!}
</div>

<!-- Duracao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duracao', 'Duracao:') !!}
    {!! Form::text('duracao', null, ['class' => 'form-control']) !!}
</div>

<!-- Descricao Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descricao', 'Descricao:') !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Trailer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('trailer', 'Trailer:') !!}
    {!! Form::text('trailer', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('filmes.index') !!}" class="btn btn-default">Cancel</a>
</div>
