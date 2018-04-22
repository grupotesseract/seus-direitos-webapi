<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvencaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convencaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('resumo');
            $table->string('arquivo');
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('convencaos');
    }
}
