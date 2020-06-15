<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('precio');
            $table->integer('numeroSerie');
            $table->unsignedBigInteger('idBoletero');
            $table->unsignedBigInteger('idAuxiliar');
            $table->unsignedBigInteger('idEmpresa');

            $table->foreign('idBoletero')->references('id')->on('boleteros');
            $table->foreign('idAuxiliar')->references('id')->on('auxiliars');
            $table->foreign('idEmpresa')->references('idEmpresa')->on('boleteros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boletos');
    }
}
