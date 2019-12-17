
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

<!-- Sindicato Id Field -->
<div class="form-group">
    {!! Form::label('sindicato_id', 'Sindicato:') !!}
    <p>{!! $noticias->sindicato->nome !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:') !!}
    <p>{!! $noticias->created_at->format('d/m/Y H:i:s') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Atualizado em:') !!}
    <p>{!! $noticias->updated_at->format('d/m/Y H:i:s') !!}</p>
</div>

