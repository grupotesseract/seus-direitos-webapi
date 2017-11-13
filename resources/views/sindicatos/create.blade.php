@extends('layouts.app')

@section('content')
<script>

//Funcao para clonar a linha da cidade, trocando o botao de adicionar por remover e removendo o disabled do input hidden
var selecionarCidade = function(ev) {
    var linha = $(ev.target).parents('tr');
    var containerSelecionadas = $('.cidades-selecionadas');

    var clone = linha.clone();
    var htmlBtnRemover = "<i class='fa fa-close'></i> &nbsp; Remover ";

    clone.find('a.btn.btn-info')
        .attr('onclick', 'removerLinha(event)')
        .removeClass('btn-info')
        .addClass('btn-danger')
        .html(htmlBtnRemover)
        .next().removeAttr('disabled');

    containerSelecionadas.append(clone);
};

var removerLinha = function(ev) {
    $(ev.target).parents('tr').remove();
}

</script>



    <section class="content-header">
        <h3>
            Criando um novo Sindicato
        </h3>
    </section>
    <div class="content">


        @include('adminlte-templates::common.errors')
        

        {!! Form::open(['route' => 'sindicatos.store']) !!}


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


                <div class="datatable-crud-sindicatos">
                    @include('sindicatos.cidades-table')
                </div>
            </div>
        </div>
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>
@endsection
