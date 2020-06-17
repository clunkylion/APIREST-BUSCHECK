<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdUsuarioToTotalVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('total_ventas', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('idUsuario');
            $table->foreign('idUsuario')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('total_ventas', function (Blueprint $table) {
            //
            $table->dropColumn('idUsuario');
        });
    }
}
