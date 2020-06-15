<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChofersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chofers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('rutChofer', 20);
            $table->string('nombreChofer', 30);
            $table->string('apellidoChofer', 30);
            $table->string('telefonoChofer', 20);
            $table->string('correoChofer', 60);
            $table->string('sexoChofer', 30);
            $table->string('fechaNacimiento', 50);
            $table->string('nombreUsuario', 50);
            $table->string('contraseñaChofer', 50);
            $table->string('ultimoInicioSesion', 50);
            $table->unsignedBigInteger('idEmpresa');
            $table->foreign('idEmpresa')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chofers');
    }
}
