<style>
		.container-logo-sindicato {
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-pack: center;
					-ms-flex-pack: center;
							justify-content: center;
			width: 30%;
			margin: 0 1rem;
		}
</style> 
<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Sigla Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sigla', 'Sigla:') !!}
    {!! Form::text('sigla', null, ['class' => 'form-control']) !!}
</div>

<!-- Nome Responsavel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome_responsavel', 'Nome Responsavel:') !!}
    {!! Form::text('nome_responsavel', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Categoria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_categoria', 'Categoria:') !!}
    <div class="row">
        <div class="col-xs-12">
            {!! Form::select('id_categoria', $categorias, isset($sindicato) ? $sindicato->categoria_id : null) !!}
        </div>
    </div>
</div>

<!-- Descricao Listagem Field -->
<div class="form-group col-sm-6">
    @include('fotos.partials.fields', [
        'label' => 'Logo do Sindicato:'
    ])
</div>


@if (isset($sindicato))
	@if ($sindicato->logo)
		<div class="form-group col-sm-6">
			<div class="container-logo-sindicato">	
				<img src="{{$sindicato->logo->urlCloudinary}}" alt="Logo do sindicato" class="img-responsive">
			</div>
		</div>
	@else
			<p>Nenhum logo adicionado - <a href="{{route('sindicatos.edit', $sindicato->id)}}"> Editar</a> </p> 
	@endif
@endif
