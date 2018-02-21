<table class="table table-responsive" id="filmes-table">
    <thead>
        <th>Nome</th>
        <th>Idade</th>
        <th>Gênero</th>
        <th>Duração</th>
        <th>Descrição</th>
        <th>Trailer</th>
        <th colspan="3">Ação</th>
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
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que deseja excluir este registro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>