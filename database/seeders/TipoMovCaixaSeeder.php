<?php

namespace Database\Seeders;

use App\Models\Caixa\TipoMovCaixa;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class TipoMovCaixaSeeder extends Seeder
{
    public function run()
    {
        $this->newTipoMovCaixa('ENTRADA');
        $this->newTipoMovCaixa('SAIDA');
    }

    private function newTipoMovCaixa($nome) {
        $tipo = new TipoMovCaixa();
        $tipo->nome = $nome;
        $tipo->save();
    }

}
