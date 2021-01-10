<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentoSalariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimento_salarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('valor');
            $table->date('dtmovimento');
            $table->string('observacao')->nullable();

            $table->integer('competencia_id')->unsigned();
            $table->integer('tipo_mov_salario_id')->unsigned();
            $table->integer('cat_mov_salario_id')->unsigned();
            $table->integer('colaborador_id')->unsigned();

            $table->foreign('competencia_id')->references('id')->on('competencias');
            $table->foreign('tipo_mov_salario_id')->references('id')->on('tipo_mov_salarios');
            $table->foreign('cat_mov_salario_id')->references('id')->on('cat_mov_salarios');
            $table->foreign('colaborador_id')->references('id')->on('colaboradors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_movimento_salarios');
    }
}
