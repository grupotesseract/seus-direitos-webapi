@extends('layouts.app')

@section('head_scripts')
    <script src="/js/app.js"></script>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Criando usuário super-admin
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'users.store']) !!}

                        @include('users.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
