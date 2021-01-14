<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferencias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('valor');
            $table->string('banco_origem', 32);
            $table->string('agencia_origem', 32);
            $table->string('conta_origem', 32);
            $table->string('operacao_origem', 32)->nullable();
            $table->string('banco_destino', 32);
            $table->string('agencia_destino', 32);
            $table->string('conta_destino', 32);
            $table->string('operacao_destino', 32)->nullable();
            $table->date('dttransferencia');
            $table->string('numcomprovante')->nullable();
            $table->string('observacao')->nullable();

            $table->integer('pagamento_id')->unsigned();
            $table->foreign('pagamento_id')->references('id')->on('pagamentos')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transferencias');
    }
}
