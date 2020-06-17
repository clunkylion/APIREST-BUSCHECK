<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('rut');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('correo');
            $table->string('sexo');
            $table->string('fechaNacimiento');
            $table->string('tipoPersona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
