<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nombreUsuario');
            $table->string('contraseña');
            $table->string('ultimoInicioSesion');
            $table->integer('estadoUsuario');
            $table->unsignedBigInteger('idEmpresa');
            $table->unsignedBigInteger('idPersona');
            
            $table->foreign('idEmpresa')->references('id')->on('empresas');
            $table->foreign('idPersona')->references('id')->on('personas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
