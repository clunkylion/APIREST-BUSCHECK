<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdPersonaToAdministradors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('administradors', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('idPersona');
            $table->foreign('idPersona')->references('id')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('administradors', function (Blueprint $table) {
            //
            $table->dropColumn('idPersona');
        });
    }
}
