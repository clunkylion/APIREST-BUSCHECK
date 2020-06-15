<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuxiliarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auxiliars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('rutAuxiliar', 15);
            $table->string('nombreAuxiliar', 50);
            $table->string('apellidoAuxiliar', 50);
            $table->string('telefonoAuxiliar', 20);
            $table->string('correoAuxiliar', 50);
            $table->string('sexoAuxiliar', 30);
            $table->string('fechaNacimiento', 50);
            $table->string('nombreUsuario', 50);
            $table->string('contraseñaAuxiliar', 50);
            $table->string('ultimoInicioSesion');
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
        Schema::dropIfExists('auxiliars');
    }
}
