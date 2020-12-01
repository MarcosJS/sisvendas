<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentoCaixasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimento_caixas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('valor');
            $table->date('dt_movimento');

            $table->integer('turno_id')->unsigned();
            $table->integer('pagamento_id')->unsigned()->nullable();
            $table->integer('tipo_mov_caixa_id')->unsigned();
            $table->integer('cat_mov_caixa_id')->unsigned();
            $table->integer('usuario_id')->unsigned();

            $table->foreign('turno_id')->references('id')->on('turnos');
            $table->foreign('pagamento_id')->references('id')->on('pagamentos')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('tipo_mov_caixa_id')->references('id')->on('tipo_mov_caixas');
            $table->foreign('cat_mov_caixa_id')->references('id')->on('cat_mov_caixas');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimento_caixas');
    }
}
