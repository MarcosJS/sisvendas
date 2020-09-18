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
            $table->integer('usuario_id')->unsigned();
            $table->integer('cliente_id')->unsigned();
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
