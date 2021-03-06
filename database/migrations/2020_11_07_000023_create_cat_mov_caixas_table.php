<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatMovCaixasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_mov_caixas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');

            $table->integer('tipo_mov_caixa_id')->unsigned();
            $table->foreign('tipo_mov_caixa_id')->references('id')->on('tipo_mov_caixas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_mov_caixas');
    }
}
