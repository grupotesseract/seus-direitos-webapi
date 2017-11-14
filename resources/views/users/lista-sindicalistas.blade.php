@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Listagem de usuários do tipo sindicalista
           <a class="btn btn-primary pull-right" style="margin-top: -5px;margin-bottom: 5px" href="/usuarios/sindicalistas/create">Criar novo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('users.table')
            </div>
        </div>
    </div>
@endsection

