<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlteraPropagandasNomeLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('propagandas', function (Blueprint $table) {
            $table->renameColumn('nome', 'url_destino');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('propagandas', function (Blueprint $table) {
            $table->renameColumn('url_destino', 'nome');
        });
    }
}
