<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChequesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheques', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('numero')->unique();
            $table->decimal('valor');
            $table->date('vencimento');
            $table->date('emissao')->nullable();
            $table->string('banco', 32);
            $table->string('agencia', 32);
            $table->string('contacorrente', 32);
            $table->string('portador', 100)->nullable();
            //$table->integer('emitente_id')->unsigned();
            $table->integer('pagamento_id')->unsigned();
            //$table->foreign('emitente_id')->references('id')->on('emitentes');
            $table->foreign('pagamento_id')->references('id')->on('pagamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cheques');
    }
}
