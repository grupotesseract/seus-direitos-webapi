@extends('layouts.app')

@section('css')
    <script src="/css/app.css"></script>
@endsection

@section('head_scripts')
    <script src="/js/app.js"></script>
@endsection



@section('content')
    <section class="content-header">
        <h1>Listagem de todos os usuários</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('layouts.datatable')
            </div>
        </div>
    </div>
@endsection

