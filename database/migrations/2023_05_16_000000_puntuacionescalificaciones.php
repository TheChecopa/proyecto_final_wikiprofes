<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PuntuacionesCalificaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntuaciones_calificaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calificacion_id');
            $table->foreign('calificacion_id')->references('id')->on('calificaciones');
            $table->unsignedBigInteger('Puntuacion_id');
            $table->foreign('Puntuacion_id')->references('id')->on('puntuaciones');
            $table->double('cant_usa')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puntuaciones_calificaciones');
    }
}
