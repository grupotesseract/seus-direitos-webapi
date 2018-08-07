@extends('layout-welcome.head')

<section class="content-header">
    <h1>
        Fale Conosco
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    @include('flash::message')

    <div class="box box-primary">

        <div class="box-body">
            <div class="row">
                {!! Form::open(['route' => 'faleConoscos.store']) !!}

                    @include('fale_conoscos.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
