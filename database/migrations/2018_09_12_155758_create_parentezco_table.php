<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentezcoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parentezco', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id_tutor')->unsigned();
            $table->foreign('id_tutor')->references('id')->on('tutor')->onDelete('cascade');
            $table->integer('id_alumno')->unsigned();
            $table->foreign('id_alumno')->references('id')->on('alumno')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parentezco');
    }
}
