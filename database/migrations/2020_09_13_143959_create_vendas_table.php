<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('dtvenda');
            $table->time('hrvenda');
            $table->decimal('totalprodutos')->default(0);
            $table->decimal('desconto')->default(1.0);
            $table->decimal('totalliq')->default(0);
            $table->date('dtpagamento')->nullable();
            $table->integer('metodopagamento_id')->unsigned()->nullable();
            $table->integer('statusvenda_id')->unsigned()->default(1);
            $table->integer('statuspagamento_id')->unsigned()->default(1);
            $table->integer('usuario_id')->unsigned();
            $table->integer('cliente_id')->unsigned()->nullable();
            $table->foreign('metodopagamento_id')->references('id')->on('metodo_pagamentos');
            $table->foreign('statusvenda_id')->references('id')->on('status_vendas');
            $table->foreign('statuspagamento_id')->references('id')->on('status_pagamentos');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
