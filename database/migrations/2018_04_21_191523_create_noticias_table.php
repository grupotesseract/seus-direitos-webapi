<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNoticiasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->increments('id');
            $table->text('manchete');
            $table->text('corpo');
            $table->string('thumbnail', 1000);
            $table->integer('sindicato_id')->unsigned()->nullable();
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
        Schema::drop('noticias');
    }
}
