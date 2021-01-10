<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaboradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaboradors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 100);
            $table->date('dtnascimento')->nullable();
            $table->string('cpf', 11)->unique();
            $table->integer('matricula')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('funcao_id')->unsigned();
            $table->foreign('funcao_id')->references('id')->on('funcaos');
            $table->decimal('salario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colaboradors');
    }
}
