<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarColunaTextoConvencoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('convencaos', function (Blueprint $table) {
            $table->text('texto')->nullable();
            $table->dropColumn('arquivo');
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
            $table->dropColumn('texto');
            $table->text('arquivo')->nullable();
        });
    }
}
