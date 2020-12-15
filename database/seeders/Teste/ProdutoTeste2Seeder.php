<?php

namespace Database\Seeders\Teste;

use App\Models\Produto\Produto;
use App\Models\Produto\TipoMovEstoque;
use App\Models\Usuario;
use Database\Factories\Produto\MovimentoEstoque;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ProdutoTeste2Seeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $produto = new Produto();
        $produto->nome = 'fuba';
        $produto->descricao = 'dfoso asdfwe wér';
        $produto->preco = 1.20;
        $produto->save();

        $produtos[] = $produto;

        $produto = new Produto();
        $produto->nome = 'xerem';
        $produto->descricao = 'dfoso asdfwe wér';
        $produto->preco = 3.55;
        $produto->save();

        $produtos[] = $produto;

        foreach ($produtos as $produto) {
            $produto->addMovEstoque('ENTRADA', 'ENTRADA PRODUCAO', 5000, date("Y-m-d"), 1);
        }
    }
}
