<?php

namespace Database\Seeders;

use App\Models\Produto\TipoMovEstoque;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class TipoMovEstoqueSeeder extends Seeder
{
    public function run() {
        $this->newTipoMovEstoque('ENTRADA');
        $this->newTipoMovEstoque('SAIDA');
    }

    private function newTipoMovEstoque($nome) {
        $tipo = new TipoMovEstoque();
        $tipo->nome = $nome;
        $tipo->save();
    }

}
