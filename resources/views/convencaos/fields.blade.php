<!-- Resumo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('resumo', 'Resumo:') !!}
    {!! Form::text('resumo', null, ['class' => 'form-control']) !!}
</div>


<!-- Categoria Field -->
<div class="form-group col-sm-6">
	{!! Form::label('categoria_id', 'Categoria:') !!}
	<div class="row">
			<div class="col-xs-12">
					{!! Form::select('categoria_id', $categorias, isset($convencao) ? $convencao->categoria_id : null, ['class' => 'form-control select2']) !!}
			</div>
	</div>
</div>

<!-- Texto Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('texto', 'Texto:') !!}
    {!! Form::textarea('texto', null, ['class' => 'form-control', 'id' => 'editor']) !!}
</div>


<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('convencaos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
