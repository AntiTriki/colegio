<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuntajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntaje', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nota');
            $table->timestamps();
            $table->integer('id_inscripcion')->unsigned();
            $table->foreign('id_inscripcion')->references('id')->on('inscripcion')->onDelete('cascade');
            $table->integer('id_tiponota')->unsigned();
            $table->foreign('id_tiponota')->references('id')->on('tiponota')->onDelete('cascade');
            $table->integer('id_bimestre')->unsigned();
            $table->foreign('id_bimestre')->references('id')->on('bimestre')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puntaje');
    }
}
