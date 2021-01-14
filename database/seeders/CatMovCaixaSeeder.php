<?php

namespace Database\Seeders;

use App\Models\Caixa\CatMovCaixa;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CatMovCaixaSeeder extends Seeder
{
    public function run()
    {
        $this->newCatMovCaixa('SUPRIMENTO', 1);
        $this->newCatMovCaixa('SANGRIA', 2);
        $this->newCatMovCaixa('RECEBIMENTO', 1);
        $this->newCatMovCaixa('ESTORNO', 2);
        $this->newCatMovCaixa('DEVOLUCAO', 2);
    }

    private function newCatMovCaixa($nome, $tipo) {
        $cat = new CatMovCaixa();
        $cat->nome = $nome;
        $cat->tipoMovCaixa()->associate($tipo);
        $cat->save();
    }
}
