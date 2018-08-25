<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatefotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cloudinary_id')->nullable();
            $table->string('image_name')->nullable();
            $table->string('image_path')->nullable();
            $table->string('image_extension')->nullable();
            $table->integer('owner_id')->nullable();
            $table->string('owner_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fotos');
    }
}
