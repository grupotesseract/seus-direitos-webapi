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

<!-- Datahora Field -->
<div class="form-group col-sm-6">
    {!! Form::label('datahora', 'Datahora:') !!}
    {!! Form::text('datahora', null, ['class' => 'form-control']) !!}
</div>

<!-- Linkimagem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('linkimagem', 'Linkimagem:') !!}
    {!! Form::text('linkimagem', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('eventos.index') !!}" class="btn btn-default">Cancel</a>
</div>
