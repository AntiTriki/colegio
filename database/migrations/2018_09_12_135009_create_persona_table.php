<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->nullable();
            $table->string('ci');
            $table->string('direccion');
            $table->integer('telefono');
            $table->integer('genero');
            $table->date('fecha_nac');
            $table->string('usuario');
            $table->string('password');
            $table->integer('id_tipopersona')->unsigned();
            $table->foreign('id_tipopersona')->references('id')->on('tipopersona')->onDelete('cascade');

            $table->integer('codigo')->nullable() ;
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
        Schema::dropIfExists('persona');
    }
}
