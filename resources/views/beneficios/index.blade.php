@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Listagem de Beneficios</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('beneficios.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

