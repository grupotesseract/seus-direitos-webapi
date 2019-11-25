<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColunaCategoriaid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sindicatos', function (Blueprint $table) {
            $table->dropColumn('id_categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sindicatos', function (Blueprint $table) {
            $table->integer('id_categoria')->unsigned()->nullable();
            $table->foreign('id_categoria')->references('id')->on('categorias');
        });
    }
}
