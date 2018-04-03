@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Listagem de usuários do tipo Funcionário - Feitos pelo Aplicativo</h1>
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

