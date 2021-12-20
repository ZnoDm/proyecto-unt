<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticaObervacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practica_obervaciones', function (Blueprint $table) {
            $table->id();
            $table->string('po_detalle');
            $table->string('po_status');
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
        Schema::dropIfExists('practica_obervaciones');
    }
}
