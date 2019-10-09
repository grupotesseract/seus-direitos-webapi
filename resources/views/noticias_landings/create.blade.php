@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Noticias Landing
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'noticiasLandings.store', 'files' => true]) !!}

                        @include('noticias_landings.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
