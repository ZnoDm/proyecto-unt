<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id(); //codigo
            $table->string('alumno_apellido')->nullable();
            $table->string('alumno_nombre')->nullable();
            $table->string('alumno_email')->unique();
            $table->date('alumno_fechanacimiento')->nullable();
            $table->integer('alumno_telefono')->nullable();

            $table->unsignedBigInteger('user_id');            
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
