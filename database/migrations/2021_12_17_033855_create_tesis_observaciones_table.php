<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTesisObservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tesis_observaciones', function (Blueprint $table) {
            $table->id();
            $table->string('to_detalle');
            $table->string('to_status');
            $table->unsignedBigInteger('practica_id');
            $table->foreign('practica_id')->references('id')->on('practicas');
            $table->unsignedBigInteger('administrativo_id');
            $table->foreign('administrativo_id')->references('id')->on('administrativos');
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
        Schema::dropIfExists('tesis_observaciones');
    }
}
