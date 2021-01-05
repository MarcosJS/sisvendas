<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 50);
            $table->string('descricao', 100)->nullable();
            $table->integer('estoque')->default(0);
            $table->decimal('preco');
            $table->integer('composicao_atual')->nullable();
            $table->integer('saldo_control_estoque')->default(0);
            $table->integer('interv_controle')->default(1);
            $table->boolean('controle_estoque')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
