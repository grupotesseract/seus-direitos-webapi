<style type="text/css">
	.h3-texto {
		font-size: 15px;
	}
</style>

@extends('layout-welcome.head')

<div class="container" style="margin-top: 20px; margin-left: 50px"> 
    
    <div class="section">
        <div class="row">
	    	<img src="/img/logo-seusindicato.jpg" width="40%" height="40%" class="img-responsive" align="left">
	    </div>
	</div>
	
    <div class="section" style="margin-top: 40px; margin-left: 10px">
        <div class="row">
	        <div class="col-3">
				<img src="{{ $carteirinha->sindicato->logo->url_cloudinary }}" width="150px" height="350px" class="img-responsive" align="left">	
			</div>

			<div class="col-9">
				<h3 class="h3-texto" >{{ $carteirinha->sindicato->nome }}</h3>			
			</div>
		</div>
    </div>

    <div class="section" style="margin-left: 10px">
        <div class="row">
			<h3 class="h3-texto">Associado: {{ $carteirinha->name }}</h3>			
			<h3 class="h3-texto">RG: {{ $carteirinha->rg }}</h3>			
		</div>
    </div>

    <div class="section" style="margin-top: -20px">
        <div class="row">
			<h3 class="h3-texto" align="center">Instituicão: {{ $carteirinha->instituicao->nomecompleto }}</h3>			
		</div>
    </div>

</div>
