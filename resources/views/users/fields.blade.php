<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nome:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Senha:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('celular', 'Celular:') !!}
    {!! Form::text('celular', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rg', 'RG:') !!}
    {!! Form::text('rg', null, ['class' => 'form-control']) !!}
</div>


@if (\Request::segment(2) == 'administradores')

    {!! Form::hidden('role', 'superadmin') !!}
    <!-- Sindicato Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('tipo', 'Tipo:') !!}
        {!! Form::text('tipo', "super-admin", ['class'=> 'form-control', 'disabled']) !!}
    </div>


@elseif (\Request::segment(2) == 'sindicalistas')
    {!! Form::hidden('role', 'sindicalista') !!}

    <!-- Sindicato Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('tipo', 'Tipo:') !!}
        {!! Form::text('tipo', "sindicalista", ['class'=> 'form-control', 'disabled']) !!}
    </div>

    <!-- Sindicato Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('sindicato_id', 'Sindicato:') !!}
        {!! Form::select('sindicato_id', $sindicatos, isset($user) ? $user->sindicato->id : null) !!}
    </div>

    <!-- Sindicato Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('instituicao_id', 'Instituição:') !!}
        {!! Form::select('instituicao_id', $instituicoes, isset($user) ? $user->instituicao->id : null, ['class'=> 'form-control']) !!}
    </div>

@elseif (\Request::segment(2) == 'funcionarios')
    {!! Form::hidden('role', 'funcionario') !!}

    <!-- Sindicato Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('tipo', 'Tipo:') !!}
        {!! Form::text('tipo', "funcionario", ['class'=> 'form-control', 'disabled']) !!}
    </div>

    <!-- Sindicato Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('sindicato_id', 'Sindicato:') !!}
        {!! Form::select('sindicato_id', $sindicatos, isset($user) ? $user->sindicato->id : null) !!}
    </div>

    <!-- Sindicato Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('instituicao_id', 'Instituição:') !!}
        {!! Form::select('instituicao_id', $instituicoes, isset($user) ? $user->instituicao->id : null, ['class'=> 'form-control']) !!}
    </div>
    
{{-- CASO ESTEJA EDITANDO --}}
@elseif (\Request::segment(3) == 'edit')
    {!! Form::hidden('role', $user->roles()->first()->name) !!}

    <!-- Sindicato Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('tipo', 'Tipo:') !!}
        {!! Form::text('tipo', $user->roles()->first()->display_name, ['class'=> 'form-control', 'disabled']) !!}
    </div>

    <!-- Sindicato Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('sindicato_id', 'Sindicato:') !!}
        {!! Form::select('sindicato_id', $sindicatos, isset($user->sindicato) ? $user->sindicato->id : null, ['class' => 'form-control select2']) !!}
    </div>

    <!-- Sindicato Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('instituicao_id', 'Instituição:') !!}
        {!! Form::select('instituicao_id', isset($user->sindicato) ? $user->sindicato->instituicoes->pluck('nomecompleto', 'id') : $instituicoes, isset($user->instituicao) ? $user->instituicao->id : null, ['class'=> 'form-control']) !!}
    </div>

@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="/usuarios" class="btn btn-default">Cancelar</a>
</div>
