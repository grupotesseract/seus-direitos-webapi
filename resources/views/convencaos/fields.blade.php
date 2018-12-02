<!-- Resumo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('resumo', 'Resumo:') !!}
    {!! Form::text('resumo', null, ['class' => 'form-control']) !!}
</div>

<!-- Arquivo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('arquivo', 'Arquivo:') !!}
    {!! Form::file('arquivo') !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('categoria_id', 'Instituição:') !!}
    {!! Form::select('instituicao_id', $instituicaos, isset($convencao) ? $convencao->instituicao_id : null , ['placeholder' => 'Escolha uma Instituição', 'class' => 'form-control']) !!}
</div>


<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('convencaos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
