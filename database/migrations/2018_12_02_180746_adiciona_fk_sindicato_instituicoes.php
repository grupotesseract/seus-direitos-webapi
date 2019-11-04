<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionaFkSindicatoInstituicoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instituicoes', function (Blueprint $table) {
            //
            $table->integer('sindicato_id')->unsigned()->nullable();
            $table->foreign('sindicato_id')->references('id')->on('sindicatos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instituicoes', function (Blueprint $table) {
            $table->dropForeign(['sindicato_id']);
            $table->dropColumn('sindicato_id');
        });
    }
}
