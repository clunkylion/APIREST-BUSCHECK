<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoleterosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boleteros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('rutBoletero', 30);
            $table->string('nombreBoletero', 60);
            $table->string('apellidoBoletero', 60);
            $table->string('telefonoBoletero', 20);
            $table->string('correoBoletero', 50);
            $table->string('sexoBoletero', 50);
            $table->string('fechaNacimiento', 50);
            $table->string('nombreUsuario', 50);
            $table->string('contraseñaBoletero', 50);
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
        Schema::dropIfExists('boleteros');
    }
}
