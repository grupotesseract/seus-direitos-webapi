<table class="table table-responsive" id="filmes-table">
    <thead>
        <th>Nome</th>
        <th>Idade</th>
        <th>Genero</th>
        <th>Duracao</th>
        <th>Descricao</th>
        <th>Trailer</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($filmes as $filme)
        <tr>
            <td>{!! $filme->nome !!}</td>
            <td>{!! $filme->idade !!}</td>
            <td>{!! $filme->genero !!}</td>
            <td>{!! $filme->duracao !!}</td>
            <td>{!! $filme->descricao !!}</td>
            <td>{!! $filme->trailer !!}</td>
            <td>
                {!! Form::open(['route' => ['filmes.destroy', $filme->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('filmes.show', [$filme->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('filmes.edit', [$filme->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>