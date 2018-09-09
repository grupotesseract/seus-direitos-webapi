<style type="text/css">
	

</style>

@extends('layout-welcome.head')

<div class="container"> 
    <div class="section">
        <div class="row">
	    	<img src="/img/logo-seusindicato.jpg" width="40%" height="40%" class="img-responsive" align="left">
	    </div>
	</div>
	
    <div class="section">
        <div class="row">
	        <div class="col-3">
				<img src="{{ $carteirinha->sindicato->logo->url_cloudinary }}" width="20%" height="20%" class="img-responsive" align="left">	
			</div>

			<div class="col-9">
				<h3>{{ $carteirinha->sindicato->nome }}</h3>			
			</div>
		</div>
    </div>

    <div class="section">
        <div class="row">
			<h3>Associado: {{ $carteirinha->name }}</h3>			
			<h3>RG: {{ $carteirinha->rg }}</h3>			
		</div>
    </div>

    <div class="section">
        <div class="row">
			<h3>Instituicão: {{ $carteirinha->instituicao->nomecompleto }}</h3>			
		</div>
    </div>

</div>
