{{-- Blade usada para mostrar um select de sindicatos --}}
{{-- Já recebe o $selectSindicatos pelo SindicatoViewComposer --}} 
{{-- Pode receber $sindicatoId (int) para indicar qual key está ativa --}} 


{!! Form::label('sindicato_id', 'Sindicato:') !!}
{!! Form::select('sindicato_id', $selectSindicatos, isset($sindicatoId) ? $sindicatoId : null, ['class' => 'form-control select2', isset($sindicatoId) ? 'disabled' : '' ] ) !!}

@if ( isset($sindicatoId) )
{!! Form::hidden('sindicato_id', $sindicatoId) !!}
@endif
