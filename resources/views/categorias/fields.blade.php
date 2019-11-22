<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>
 
<!-- Sindicato Field -->
<div class="form-group col-sm-6">
	{!! Form::label('sindicato_id', 'Sindicato:') !!}
	{!! Form::select('sindicato_id', $sindicatos, isset($categoria->sindicato) ? $categoria->sindicato->id : null, ['class' => 'form-control select2']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('categorias.index') !!}" class="btn btn-default">Cancelar</a>
</div>
