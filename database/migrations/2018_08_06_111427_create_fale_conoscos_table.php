<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaleConoscosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fale_conoscos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('assunto');
            $table->text('texto');
            $table->integer('sindicato_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::drop('fale_conoscos');
    }
}
