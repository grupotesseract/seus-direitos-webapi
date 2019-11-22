<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColunaCategoriaid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
						$table->integer('categoria_id')->unsigned()->nullable();
						$table->foreign('categoria_id')->references('id')->on('categorias');
				});
				
				Schema::table('convencaos', function (Blueprint $table) {
						$table->integer('categoria_id')->unsigned()->nullable();
						$table->foreign('categoria_id')->references('id')->on('categorias');
				});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
						$table->dropColumn('categoria_id');
				});
				
				Schema::table('convencaos', function (Blueprint $table) {
						$table->dropColumn('categoria_id');
				});
    }
}
