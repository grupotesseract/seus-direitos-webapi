@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sindicato
				</h1>
				<a href={{ $sindicato->id.'/usuarios' }} class="btn btn-primary">Visualizar Associados</a>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
								<div class="row" style="padding-left: 20px">
                    @include('sindicatos.show_fields')
                    <a href="{!! route('sindicatos.index') !!}" class="btn btn-default">Voltar</a>
								</div>
								
            </div>
        </div>
    </div>
@endsection
