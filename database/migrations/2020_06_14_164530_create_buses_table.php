<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('estado', 45);
            $table->string('patente', 30);
            $table->string('marca', 45);
            $table->string('modelo', 45);
            $table->integer('numAsientos');
            $table->string('revisionTecnica', 30);
            $table->unsignedBigInteger('idChofer');
            
            $table->unsignedBigInteger('idEmpresa');
            $table->foreign('idChofer')->references('id')->on('chofers');
            $table->foreign('idEmpresa')->references('idEmpresa')->on('chofers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buses');
    }
}
