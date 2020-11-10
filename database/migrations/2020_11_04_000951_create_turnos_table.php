<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('abertura');
            $table->dateTime('fechamento')->nullable();

            $table->integer('movimento_caixa_id')->unsigned()->nullable();
            $table->integer('usuario_id')->unsigned();
            $table->integer('caixa_id')->unsigned();
            $table->integer('status_turno_id')->unsigned()->default(1);

            $table->foreign('movimento_caixa_id')->references('id')->on('movimento_caixas');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('caixa_id')->references('id')->on('caixas');
            $table->foreign('status_turno_id')->references('id')->on('status_turnos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turnos');
    }
}
