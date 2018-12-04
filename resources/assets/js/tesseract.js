/**
 * TUDO DENTRO DESSE BLOCO É EXECUTADO NO READY, APOS o DOM LOADED
 *
 * @PS: para utilizar do attr 'onclick' do html é necessario atribuir a funcao ao obj window.
 */
$(function () {

    bindaSelectCategorias();
    bindaSelectSindicatos();
    bindaSelectInstituicoes();
    bindaAjaxSelectSindicatosInstituicoes();

    /**
     * Funcao para 'clonar' a 1 linha da datatable de cidades e inserir como 
     * uma cidade selecionada no crud de sindicatos
     */
    window.selecionarCidade = function(ev) {
        let linha = $(ev.target).parents('tr');
        let containerSelecionadas = $('.cidades-selecionadas');
        let clone = linha.clone();
        let htmlBtnRemover = "<i class='fa fa-close'></i> &nbsp; Remover ";

        clone.find('a.btn.btn-info')
            .attr('onclick', 'removerLinha(event)')
            .removeClass('btn-info')
            .addClass('btn-danger')
            .html(htmlBtnRemover)
            .next().removeAttr('disabled');

        containerSelecionadas.append(clone);
    };

    /**
     * Funcao para remover a cidade selecionada no crud de sindicatos
     */
    window.removerLinha = function(ev) {
        $(ev.target).parents('tr').remove();
    }

});

/**
 * Funcao para checar se existe um select de categorias e chama o select2
 */
var bindaSelectCategorias = function(){
    if ( $('#id_categoria').length ){
        $('#id_categoria').select2({
            width: '100%'
        });
    }
};

/**
 *
 * Funcao para checar se existe um select de sindicatos e chama o select2
 */
var bindaSelectSindicatos = function(){
    if ( $('#sindicato_id').length ){
        $('#sindicato_id').select2({
            width: '100%'
        });
    }
};

/**
 *
 * Funcao para checar se existe um select de sindicatos e chama o select2
 */
var bindaSelectInstituicoes = function(){
    if ( $('#instituicao_id').length ){
        $('#instituicao_id').select2({
            width: '100%'
        });
    }
};

/**
 *
 * Funcao para checar se existe um select de sindicatos e de instituições e preencher as opçoes via ajax
 */
var bindaAjaxSelectSindicatosInstituicoes = function(){
    if ( $('#instituicao_id').length &&  $('#sindicato_id').length ){
        console.log('bindou');
        $('#sindicato_id').change(function(event){
            let idSindicato = event.target.value;
            $.ajax({
                url: '/api/sindicatos/'+idSindicato+'/instituicoes',
                type: 'GET',
                dataType: 'json',
                complete: function (jqXHR, textStatus) {
                    // callback
                },
                success: function (data, textStatus, jqXHR) {
                    if (data.data) {
                        let novasOps = '<option value="0">Selecione uma instituição</option>';
                        data.data.forEach(function(el) {
                            novasOps += '<option value="'+el.id+'">'+el.nomecompleto+'</option>';
                        });

                        $('#instituicao_id').html(novasOps);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // error callback
                }
            });

        });
    }
};
