<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentoEstoquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimento_estoques', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('quantidade');
            $table->date('dtproducao');
            $table->integer('tipo_mov_estoque_id')->unsigned();
            $table->foreign('tipo_mov_estoque_id')->references('id')->on('tipo_mov_estoques');
            $table->integer('cat_mov_estoque_id')->unsigned();
            $table->foreign('cat_mov_estoque_id')->references('id')->on('cat_mov_estoques');
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');
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
        Schema::dropIfExists('movimento_estoques');
    }
}
