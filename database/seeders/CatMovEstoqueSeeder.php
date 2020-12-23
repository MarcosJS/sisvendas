<?php

namespace Database\Seeders;

use App\Models\Produto\CatMovEstoque;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CatMovEstoqueSeeder extends Seeder
{
    public function run()
    {
        $this->newCatMovEstoque('ENTRADA PRODUCAO');
        $this->newCatMovEstoque('ENTRADA ESTOQUE');
        $this->newCatMovEstoque('RETORNO ESTOQUE');
        $this->newCatMovEstoque('CANCELAMENTO VENDA');
        $this->newCatMovEstoque('VENDA');
        $this->newCatMovEstoque('BAIXA ESTOQUE');
    }

    private function newCatMovEstoque($nome) {
        $tipo = new CatMovEstoque();
        $tipo->nome = $nome;
        $tipo->save();
    }
}
