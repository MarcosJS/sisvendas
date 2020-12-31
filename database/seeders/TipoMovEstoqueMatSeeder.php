<?php

namespace Database\Seeders;

use App\Models\MateriaPrima\TipoMovEstoqueMat;
use Illuminate\Database\Seeder;

class TipoMovEstoqueMatSeeder extends Seeder
{
    public function run() {
        $this->newTipoMovEstoque('ENTRADA');
        $this->newTipoMovEstoque('SAIDA');
    }

    private function newTipoMovEstoque($nome) {
        $tipo = new TipoMovEstoqueMat();
        $tipo->nome = $nome;
        $tipo->save();
    }

}
