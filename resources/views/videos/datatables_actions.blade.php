<div class='btn-group'>
{!! Form::open(['route' => ['videos.destroy', $id], 'method' => 'delete']) !!}
    <a href="{{ route('videos.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('videos.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
{!! Form::close() !!}

@role('superadmin')
{!! Form::open(['url' => '/videos/'.$id.'/destaque']) !!}

    {!! Form::button('<i class="glyphicon glyphicon-star"></i>&nbsp; Destaque', [
        'type' => 'submit',
        'class' => 'btn btn-success btn-xs',
        'onclick' => "return confirm('Deseja trocar o video em destaque?')"
    ]) !!}

{!! Form::close() !!}
@endrole
</div>
