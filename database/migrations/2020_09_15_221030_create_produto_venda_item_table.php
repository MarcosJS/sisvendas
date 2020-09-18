<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoVendaItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_venda_item', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('produto_id')->unsigned();
            $table->integer('venda_item_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('venda_item_id')->references('id')->on('venda_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_venda_item');
    }
}
