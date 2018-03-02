<table class="table table-responsive" id="promocaos-table">
    <thead>
        <tr>
            <th>Nome</th>
        <th>Descricao</th>
        <th>Loja</th>
        <th>Observacao</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($promocaos as $promocao)
        <tr>
            <td>{!! $promocao->nome !!}</td>
            <td>{!! $promocao->descricao !!}</td>
            <td>{!! $promocao->loja !!}</td>
            <td>{!! $promocao->observacao !!}</td>
            <td>
                {!! Form::open(['route' => ['promocaos.destroy', $promocao->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('promocaos.show', [$promocao->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('promocaos.edit', [$promocao->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>