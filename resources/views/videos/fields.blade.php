<!-- Sindicato Id Field -->
<div class="form-group col-sm-6">
    @include('sindicatos.partials.select')
</div>

<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Descricao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descricao', 'Descricao:') !!}
    {!! Form::text('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Youtube Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('youtube_id', 'Youtube Id:') !!}
    {!! Form::text('youtube_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('videos.index') !!}" class="btn btn-default">Cancel</a>
</div>
