<!-- Id Field -->
<div class="col-xs-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $propaganda->id !!}</p>
</div>

<!-- Nome Field -->
<div class="col-xs-6">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{!! $propaganda->nome !!}</p>
</div>

<!-- Created At Field -->
<div class="col-xs-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $propaganda->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="col-xs-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $propaganda->updated_at !!}</p>
</div>

<div class="col-xs-12">
    <img src="{{$propaganda->url}}" alt="Foto da propaganda" class="img-responsive">
</div>

<div class="col-xs-12">
<hr>
</div>
