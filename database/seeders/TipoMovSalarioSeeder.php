<?php

namespace Database\Seeders;

use App\Models\Colaborador\TipoMovSalario;
use Illuminate\Database\Seeder;

class TipoMovSalarioSeeder extends Seeder
{
    public function run()
    {
        $this->newTipoMovCaixa('ENTRADA');
        $this->newTipoMovCaixa('SAIDA');
    }

    private function newTipoMovCaixa($nome) {
        $tipo = new TipoMovSalario();
        $tipo->nome = $nome;
        $tipo->save();
    }

}
