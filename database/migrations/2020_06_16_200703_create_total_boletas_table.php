<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalBoletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('totalVenta');
            $table->integer('cantFrecuentes');
            $table->integer('cantNormales');
            $table->integer('cantEstudiantes');
            $table->integer('cantTotalPasajeros');
            
            $table->unsignedBigInteger('idChofer');
            $table->unsignedBigInteger('idBus');
            $table->unsignedBigInteger('idEmpresa');
            $table->unsignedBigInteger('idHorario');

            $table->foreign('idChofer')->references('id')->on('chofers');
            $table->foreign('idBus')->references('id')->on('buses');
            $table->foreign('idEmpresa')->references('id')->on('empresas');
            $table->foreign('idHorario')->references('id')->on('horarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('total_boletas');
    }
}
