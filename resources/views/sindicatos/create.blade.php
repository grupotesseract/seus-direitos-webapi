@extends('layouts.app')

@section('css')
    <script src="/css/app.css"></script>
@endsection

@section('head_scripts')
    <script src="/js/app.js"></script>
@endsection

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-xs-12">

                @include('adminlte-templates::common.errors')

                <h3> Criando um novo Sindicato </h3>

                {!! Form::open(['route' => 'sindicatos.store', 'files' => 'true']) !!}

                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row">
                            @include('sindicatos.fields')
                        </div>
                    </div>
                </div>

                <h3>Selecione as cidades que esse Sindicato opera</h3>

                <div class="box box-primary">
                    <div class="box-body">

                        <h4>Cidades selecionadas: </h4>
                        <table class="cidades-selecionadas">
                            <thead>
                                <tr role="row">
                                    <th style="width: 120px;">-</th> 
                                    <th style="margin-left: 20px; min-width: 100px; margin-right: 20px;">Nome</th>
                                    <th style="margin-left: 20px;">Estado</th>
                                </tr>
                            </thead>
                        </table>

                        <hr>

                        <div class="datatable-crud-sindicatos">
                            @include('layouts.base-datatable')
                        </div>
                    </div>
                </div>

                <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                    <a href="{!! route('sindicatos.index') !!}" class="btn btn-default">Cancelar</a>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection

