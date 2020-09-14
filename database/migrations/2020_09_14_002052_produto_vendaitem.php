<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProdutoVendaitem extends Migration
{

    public function up()
    {
        Schema::create('produto_vendaitem', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('produtos_id')->unsigned();
            $table->integer('venda_items_id')->unsigned();
            $table->foreign('produtos_id')->references('id')->on('produtos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('venda_items_id')->references('id')->on('venda_items')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }


    public function down()
    {
        Schema::dropIfExists('produto_vendaitem');
    }
}
