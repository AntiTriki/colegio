<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programa', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id_turno')->unsigned();
            $table->foreign('id_turno')->references('id')->on('turno')->onDelete('cascade');
            $table->integer('id_nivel')->unsigned();
            $table->foreign('id_nivel')->references('id')->on('nivel')->onDelete('cascade');
            $table->integer('id_grado')->unsigned();
            $table->foreign('id_grado')->references('id')->on('grado')->onDelete('cascade');
            $table->integer('id_grupo')->unsigned();
            $table->foreign('id_grupo')->references('id')->on('grupo')->onDelete('cascade');
            $table->integer('id_gestion')->unsigned();
            $table->foreign('id_gestion')->references('id')->on('gestion')->onDelete('cascade');
            $table->integer('id_profesor')->unsigned();
            $table->foreign('id_profesor')->references('id')->on('persona')->onDelete('cascade');
            $table->integer('id_materia')->unsigned();
            $table->foreign('id_materia')->references('id')->on('materia')->onDelete('cascade');
            $table->integer('activo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programa');
    }
}
