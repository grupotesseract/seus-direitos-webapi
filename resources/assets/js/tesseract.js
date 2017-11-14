/**
 * TUDO DENTRO DESSE BLOCO É EXECUTADO NO READY, APOS o DOM LOADED
 *
 * @PS: para utilizar do attr 'onclick' do html é necessario atribuir a funcao ao obj window.
 */
$(function () {

    bindaSelectCategorias();

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

var bindaSelectCategorias = function(){
    if ( $('#id_categoria').length ){
        $('#id_categoria').select2({
            width: '100%'
        });
    }
};