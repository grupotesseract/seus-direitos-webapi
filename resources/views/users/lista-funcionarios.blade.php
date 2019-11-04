@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Listagem de usuários do tipo Funcionário - Feitos pelo Aplicativo</h1>
        <a class="btn btn-primary pull-right" style="margin-top: -5px;margin-bottom: 5px" href="/usuarios/funcionarios/create">Criar novo</a>
        <a class="btn btn-primary pull-right" style="margin-top: -5px;margin-bottom: 5px; margin-right: 10px" href="/usuarios/importar">Importar Planilha</a>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('layouts.base-datatable')
            </div>
        </div>
    </div>
@endsection

