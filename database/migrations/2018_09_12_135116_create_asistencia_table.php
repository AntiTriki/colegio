<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencia', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id_inscripcion')->unsigned();
            $table->foreign('id_inscripcion')->references('id')->on('inscripcion')->onDelete('cascade');
            $table->integer('presente')->nullable();
            $table->date('fecha');
            $table->string('comentario')->nullable();
            $table->integer('activo')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistencia');
    }
}
