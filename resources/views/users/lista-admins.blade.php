@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Listagem de usuários do tipo super-admin
           <a class="btn btn-primary pull-right" style="margin-top: -5px;margin-bottom: 5px" href="/usuarios/administradores/create">Criar novo</a>
        </h1>
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

