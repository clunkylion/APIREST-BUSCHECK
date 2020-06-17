<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdUsuarioAndIdEmpresaToBoletos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boletos', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('idUsuario');
            $table->unsignedBigInteger('idEmpresa');

            $table->foreign('idUsuario')->references('id')->on('usuarios');
            $table->foreign('idEmpresa')->references('idEmpresa')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boletos', function (Blueprint $table) {
            //
            $table->dropColumn('idUsuario');
            $table->dropColumn('idEmpresa');
        });
    }
}
