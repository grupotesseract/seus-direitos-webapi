<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColunaInstituicaoid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('convencaos', function (Blueprint $table) {
						$table->dropColumn('instituicao_id');
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
						$table->integer('instituicao_id')->unsigned()->nullable();
						$table->foreign('instituicao_id')->references('id')->on('instituicoes');
        });
    }
}
