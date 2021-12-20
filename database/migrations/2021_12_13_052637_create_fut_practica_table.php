<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFutPracticaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fut_practica', function (Blueprint $table) {
            $table->id();
            $table->string('detalle');

            $table->unsignedBigInteger('practica_id');
            $table->foreign('practica_id')->references('id')->on('practicas');
            $table->unsignedBigInteger('fut_id');
            $table->foreign('fut_id')->references('id')->on('futs');
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
        Schema::dropIfExists('fut_practica');
    }
}
