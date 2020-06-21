<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_buses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('estado', 50)->nullable();
            $table->string('foto');
            $table->unsignedBigInteger('idBus');
            $table->unsignedBigInteger('idChofer');
            $table->unsignedBigInteger('idEmpresa');
            $table->foreign('idBus')->references('id')->on('buses');
            $table->foreign('idChofer')->references('idChofer')->on('buses');
            $table->foreign('idEmpresa')->references('idEmpresa')->on('buses');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foto_buses');
    }
}
