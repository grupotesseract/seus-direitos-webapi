<!-- Assunto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('assunto', 'Assunto:') !!}
    {!! Form::text('assunto', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<!-- Texto Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('texto', 'Texto:') !!}
    {!! Form::textarea('texto', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<!-- Sindicato Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sindicato_label1', 'Sindicato:') !!}
    {!! Form::label('sindicato_label2', $sindicato->nome) !!}
    {!! Form::hidden('sindicato_id', $sindicato->id) !!}
    <!-- {!! Form::select('sindicato_id', ['Escolha' => 'Escolha'], null, ['class' => 'form-control']) !!} -->
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <!-- <a href="{!! route('faleConoscos.index') !!}" class="btn btn-default">Cancel</a> -->
</div>
