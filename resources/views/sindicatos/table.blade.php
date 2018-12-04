<table class="table table-responsive" id="sindicatos-table">
    <thead>
        <th>Nome</th>
        <th>Sigla</th>
        <th>Nome Responsável</th>
        <th colspan="3">Ação</th>
    </thead>
    <tbody>
    @foreach($sindicatos as $sindicato)
        <tr>
            <td>{!! $sindicato->nome !!}</td>
            <td>{!! $sindicato->sigla !!}</td>
            <td>{!! $sindicato->nome_responsavel !!}</td>
            <td>
                {!! Form::open(['route' => ['sindicatos.destroy', $sindicato->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sindicatos.show', [$sindicato->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sindicatos.edit', [$sindicato->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Você tem certeza?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
