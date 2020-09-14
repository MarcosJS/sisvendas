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
            $table->decimal('totalprodutos');
            $table->decimal('desconto');
            $table->decimal('totalliq');
            $table->date('dtpagamento')->nullable();
            $table->string('metodopg', 20);
            $table->string('status', 20);
            $table->integer('usuarios_id')->unsigned();
            $table->integer('clientes_id')->unsigned();
            $table->foreign('usuarios_id')->references('id')->on('usuarios')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('clientes_id')->references('id')->on('clientes')->cascadeOnDelete()->cascadeOnUpdate();
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
