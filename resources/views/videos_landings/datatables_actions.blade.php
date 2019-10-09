{!! Form::open(['route' => ['videosLandings.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('videosLandings.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('videosLandings.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Você tem certeza que deseja excluir esse registro?')"
    ]) !!}
</div>
{!! Form::close() !!}
