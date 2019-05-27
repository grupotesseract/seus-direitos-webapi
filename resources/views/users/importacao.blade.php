@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Importar Associados</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="col-sm-4">
            <h4>Escolha abaixo a planilha a ser importada</h4>
            {!! Form::open(array('url'=>'usuarios/importar','method'=>'POST', 'files' => true)) !!}

            <div class="form-group">
                {!! Form::file('excel', ['required', 'class' => 'form-file']) !!}
            </div>

            <div class="col-xs-12 margin-t-1 text-right">
                <div class="col-xs-offset-3 col-xs-3">
                  {!! Form::submit('Enviar', array('class'=>'btn btn-primary btn-md')) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

