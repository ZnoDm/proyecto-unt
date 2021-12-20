<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuradoObservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurado_observaciones', function (Blueprint $table) {
            $table->id();
            $table->string('jo_detalle')->nullable();
            $table->string('jo_respuesta')->nullable();
            $table->string('jo_status'); //ESTATUS 1 = CREADA , ESTATUS=2, RESPONDIDA
            $table->unsignedBigInteger('jurado_id');
            $table->foreign('jurado_id')->references('id')->on('jurados');
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
        Schema::dropIfExists('tesis_docente_observaciones');
    }
}
