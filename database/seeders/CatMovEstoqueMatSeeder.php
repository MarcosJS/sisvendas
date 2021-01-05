<?php

namespace Database\Seeders;

use App\Models\MateriaPrima\CatMovEstoqueMat;
use Illuminate\Database\Seeder;

class CatMovEstoqueMatSeeder extends Seeder
{
    public function run()
    {
        $this->newCatMovEstoque('ENTRADA COMPRA');
        $this->newCatMovEstoque('ENTRADA ESTOQUE');
        $this->newCatMovEstoque('RETORNO ESTOQUE');
        $this->newCatMovEstoque('PRODUCAO');
        $this->newCatMovEstoque('BAIXA ESTOQUE');
    }

    private function newCatMovEstoque($nome) {
        $tipo = new CatMovEstoqueMat();
        $tipo->nome = $nome;
        $tipo->save();
    }
}
