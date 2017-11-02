<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Sigla Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sigla', 'Sigla:') !!}
    {!! Form::text('sigla', null, ['class' => 'form-control']) !!}
</div>

<!-- Nome Responsavel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome_responsavel', 'Nome Responsavel:') !!}
    {!! Form::text('nome_responsavel', null, ['class' => 'form-control']) !!}
</div>


<!-- Categoria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_categoria', 'Categoria:') !!}
    {!! Form::select('id_categoria', $categorias, ['class' => 'form-control']) !!}
</div>


<!-- Estados Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_estado', 'Estado:') !!}
    {!! Form::select('id_estado', $estados, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('sindicatos.index') !!}" class="btn btn-default">Cancel</a>
</div>
