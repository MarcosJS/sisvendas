<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentoEstoqueMatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimento_estoque_mats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('quantidade');
            $table->date('dtmovimento');
            $table->integer('tipo_mov_estoque_mat_id')->unsigned();
            $table->foreign('tipo_mov_estoque_mat_id')->references('id')->on('tipo_mov_estoque_mats');
            $table->integer('cat_mov_estoque_mat_id')->unsigned();
            $table->foreign('cat_mov_estoque_mat_id')->references('id')->on('cat_mov_estoque_mats');
            $table->integer('materia_prima_id')->unsigned();
            $table->foreign('materia_prima_id')->references('id')->on('materia_primas');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimento_estoque_mats');
    }
}
