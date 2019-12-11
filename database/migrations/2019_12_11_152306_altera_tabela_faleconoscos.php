<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlteraTabelaFaleconoscos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fale_conoscos', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fale_conoscos', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('telefone');
        });
    }
}
