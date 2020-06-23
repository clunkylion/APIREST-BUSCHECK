<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administradors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nombreUsuario', 50);
            $table->string('contraseña', 200);
            $table->string('ultimoInicioSesion');
            $table->integer('estadoAdmin');
            $table->unsignedBigInteger('idEmpresa');
            //

            $table->foreign('idEmpresa')->references('id')->on('empresas');
            //

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administradors');
    }
}
