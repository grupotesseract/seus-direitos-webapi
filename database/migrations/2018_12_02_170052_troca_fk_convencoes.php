<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrocaFkConvencoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('convencaos', function (Blueprint $table) {
            
            //dropando index e coluna antiga de ref com categoria
            $table->dropForeign(['categoria_id']);
            $table->dropColumn('categoria_id');

            //incluindo nova coluna e fk para instituicoes
            $table->integer('instituicao_id')->unsigned()->nullable();
            $table->foreign('instituicao_id')->references('id')->on('instituicoes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('convencaos', function (Blueprint $table) {
            //incluindo nova coluna e fk para instituicoes (voltando na verdade né)
            $table->integer('categoria_id')->unsigned()->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias');

            //dropando index e coluna antiga de ref com categoria (dropando a nova fk no rollback)
            $table->dropForeign(['instituicao_id']);
            $table->dropColumn('instituicao_id');

        });
    }
}
