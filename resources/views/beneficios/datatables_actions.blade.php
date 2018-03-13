{!! Form::open(['route' => ['beneficios.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Voce tem certeza?')"
    ]) !!}
</div>
{!! Form::close() !!}
