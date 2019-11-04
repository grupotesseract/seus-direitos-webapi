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
<div class="col-xs-6">
    {!! Form::label('nome', 'Nome do sindicato:') !!}
    <p>{!! $sindicato->nome !!}</p>
</div>

<!-- Sigla Field -->
<div class="col-xs-2">
    {!! Form::label('sigla', 'Sigla:') !!}
    <p>{!! $sindicato->sigla !!}</p>
</div>

<!-- Nome Responsavel Field -->
<div class="col-xs-4">
    {!! Form::label('nome_responsavel', 'Nome Responsavel:') !!}
    <p>{!! $sindicato->nome_responsavel !!}</p>
</div>

<div class="col-xs-12"> 

    {!! Form::label('logo', 'Logo do sindicato:') !!} <br>
    @if ($sindicato->logo)
			<div class="container-logo-sindicato">	
				<img src="{{$sindicato->logo->urlCloudinary}}" alt="Logo do sindicato" class="img-responsive">
			</div>
    @else
        <p>Nenhum logo adicionado - <a href="{{route('sindicatos.edit', $sindicato->id)}}"> Editar</a> </p> 
    @endif

</div>
<p>&nbsp;</p>



