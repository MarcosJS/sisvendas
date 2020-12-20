<?php

namespace Database\Seeders;

use App\Models\Caixa\CatMovCaixa;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CatMovCaixaSeeder extends Seeder
{
    public function run()
    {
        $this->newCatMovCaixa('SUPRIMENTO');
        $this->newCatMovCaixa('SANGRIA');
        $this->newCatMovCaixa('RECEBIMENTO');
        $this->newCatMovCaixa('ESTORNO');
        $this->newCatMovCaixa('DEVOLUCAO');
    }

    private function newCatMovCaixa($nome) {
        $tipo = new CatMovCaixa();
        $tipo->nome = $nome;
        $tipo->save();
    }
}
