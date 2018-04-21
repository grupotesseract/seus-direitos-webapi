<!-- Manchete Field -->
<div class="form-group col-sm-6">
    {!! Form::label('manchete', 'Manchete:') !!}
    {!! Form::text('manchete', null, ['class' => 'form-control']) !!}
</div>

<!-- Corpo Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('corpo', 'Corpo:') !!}
    {!! Form::textarea('corpo', null, ['class' => 'form-control']) !!}
</div>

<!-- Thumbnail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('thumbnail', 'Thumbnail:') !!}
    {!! Form::file('thumbnail') !!}
</div>
<div class="clearfix"></div>

<!-- Sindicato Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sindicato_id', 'Sindicato Id:') !!}
    {!! Form::select('sindicato_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('noticias.index') !!}" class="btn btn-default">Cancel</a>
</div>
