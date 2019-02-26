<!-- Manchete Field -->
<div class="form-group col-sm-6">
    {!! Form::label('manchete', 'Manchete:') !!}
    {!! Form::text('manchete', null, ['class' => 'form-control']) !!}
</div>

<!-- Corpo Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('corpo', 'Corpo:') !!}
    {!! Form::textarea('corpo', null, ['class' => 'form-control', 'id' => 'editor']) !!}
</div>



<!-- Thumbnail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('thumbnail', 'Thumbnail:') !!}
    {!! Form::file('thumbnail') !!}
</div>
<div class="clearfix"></div>

<!-- Sindicato Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sindicato_id', 'Sindicato:') !!}
    {!! Form::select('sindicato_id', $sindicatos, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('noticias.index') !!}" class="btn btn-default">Cancelar</a>
</div>
