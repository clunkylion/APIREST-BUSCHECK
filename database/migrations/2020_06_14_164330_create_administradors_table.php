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
            $table->string('rutAdmin', 15)->unique();
            $table->string('nombreAdmin', 30);
            $table->string('apellidoAdmin', 30);
            $table->string('telefonoAdmin', 15);
            $table->string('correoAdmin', 100);
            $table->string('sexoAdmin', 30);
            $table->string('fechaNacimiento', 40);
            $table->string('nombreUsuario', 50);
            $table->string('contraseñaAdmin', 50);
            $table->string('ultimoInicioSesion');
            $table->integer('estadoAdmin');
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
        Schema::dropIfExists('administradors');
    }
}
