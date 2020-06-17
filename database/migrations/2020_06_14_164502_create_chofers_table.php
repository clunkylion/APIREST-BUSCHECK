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
            $table->integer('estadoChofer');
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
