<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tipo', 20);
            $table->decimal('valor')->default(0);
            $table->date('dtpagamento')->nullable();
            $table->integer('status_pagamento_id')->unsigned()->default(1);
            $table->integer('venda_id')->unsigned();
            $table->foreign('status_pagamento_id')->references('id')->on('status_pagamentos');
            $table->foreign('venda_id')->references('id')->on('venda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagamentos');
    }
}
