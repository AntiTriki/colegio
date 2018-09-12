<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nota_final')->nullable();
            $table->timestamps();
            $table->integer('id_alumno')->unsigned();
            $table->foreign('id_alumno')->references('id')->on('alumno')->onDelete('cascade');
            $table->integer('id_programa')->unsigned();
            $table->foreign('id_programa')->references('id')->on('programa')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripcion');
    }
}
