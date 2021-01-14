<?php

namespace Database\Seeders;

use App\Models\Colaborador\CatMovSalario;
use Illuminate\Database\Seeder;

class CatMovSalarioSeeder extends Seeder
{
    public function run()
    {
        $this->newCatMovCaixa('PAGAMENTO', 1);
        $this->newCatMovCaixa('ADIANTAMENTO_PAGAMENTO', 2);
        $this->newCatMovCaixa('DEBITO_COMPETENCIA_ANTERIOR', 2);
        $this->newCatMovCaixa('PAG_INDEVIDO_COMP_ANTERIOR', 2);
        $this->newCatMovCaixa('DESC_INDEVIDO_COMP_ANTERIOR', 1);
    }

    private function newCatMovCaixa($nome, $tipo) {
        $cat = new CatMovSalario();
        $cat['nome'] = $nome;
        $cat->tipoMovSalario()->associate($tipo);
        $cat->save();
    }
}

