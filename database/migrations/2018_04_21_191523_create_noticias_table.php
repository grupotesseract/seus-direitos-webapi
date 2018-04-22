<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('thumbnailid', 1000);
            $table->string('extensao');
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
