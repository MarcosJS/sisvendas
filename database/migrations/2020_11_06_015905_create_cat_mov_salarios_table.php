<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatMovSalariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_mov_salarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');

            $table->integer('tipo_mov_salario_id')->unsigned();
            $table->foreign('tipo_mov_salario_id')->references('id')->on('tipo_mov_salarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_cat_mov_salarios');
    }
}
