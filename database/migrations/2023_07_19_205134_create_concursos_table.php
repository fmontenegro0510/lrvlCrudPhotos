<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concursos', function (Blueprint $table) {
            $table->id();
            $table->string('expediente')->nullable();
            $table->string('caratula')->nullable();
            $table->unsignedBigInteger('postulante_id');
            $table->timestamps();

            $table->foreign('postulante_id')->references('id')->on('postulantes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concursos');
    }
}
