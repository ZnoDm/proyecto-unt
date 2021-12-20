<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFutTesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fut_tesis', function (Blueprint $table) {
            $table->id();
            $table->string('detalle');

            $table->unsignedBigInteger('tesis_id');
            $table->foreign('tesis_id')->references('id')->on('tesis');
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
        Schema::dropIfExists('fut_tesis');
    }
}
