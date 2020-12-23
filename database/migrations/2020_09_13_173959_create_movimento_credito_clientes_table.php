<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentoCreditoClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimento_credito_clientes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('valor');
            $table->date('dt_movimento');
            $table->time('hr_movimento');
            $table->string('observacao')->nullable();

            $table->integer('venda_id')->unsigned()->nullable();
            $table->integer('tipo_mov_cred_cliente_id')->unsigned();
            $table->integer('cat_mov_cred_cliente_id')->unsigned();
            $table->integer('cliente_id')->unsigned();

            $table->foreign('venda_id')->references('id')->on('vendas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('tipo_mov_cred_cliente_id')->references('id')->on('tipo_mov_cred_clientes');
            $table->foreign('cat_mov_cred_cliente_id')->references('id')->on('cat_mov_cred_clientes');
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
        Schema::dropIfExists('movimento_credito_clientes');
    }
}
