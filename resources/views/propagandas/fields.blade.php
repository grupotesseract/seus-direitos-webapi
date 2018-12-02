<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url_destino', 'Link final da propaganda:') !!}
    {!! Form::text('url_destino', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    @include('fotos.partials.fields', [
        'label' => 'Foto:'
    ])
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('propagandas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
