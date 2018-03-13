<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->timestamps();
            $table->integer('sindicato_id')->unsigned();
            $table->foreign('sindicato_id')
                ->references('id')
                ->on('sindicatos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('beneficios');
    }
}
