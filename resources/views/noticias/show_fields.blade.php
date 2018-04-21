<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $noticias->id !!}</p>
</div>

<!-- Manchete Field -->
<div class="form-group">
    {!! Form::label('manchete', 'Manchete:') !!}
    <p>{!! $noticias->manchete !!}</p>
</div>

<!-- Corpo Field -->
<div class="form-group">
    {!! Form::label('corpo', 'Corpo:') !!}
    <p>{!! $noticias->corpo !!}</p>
</div>

<!-- Thumbnail Field -->
<div class="form-group">
    {!! Form::label('thumbnail', 'Thumbnail:') !!}
    <p>{!! $noticias->thumbnail !!}</p>
</div>

<!-- Sindicato Id Field -->
<div class="form-group">
    {!! Form::label('sindicato_id', 'Sindicato Id:') !!}
    <p>{!! $noticias->sindicato_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $noticias->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $noticias->updated_at !!}</p>
</div>

