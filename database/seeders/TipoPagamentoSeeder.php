<?php

namespace Database\Seeders;

use App\Models\Pagamento\TipoPagamento;
use Illuminate\Database\Seeder;

class TipoPagamentoSeeder extends Seeder
{
    public function run()
    {
        $this->newTipoPagamento('DINHEIRO');
        $this->newTipoPagamento('CHEQUE');
        $this->newTipoPagamento('TRANSFERENCIA');
    }

    private function newTipoPagamento($nome) {
        $tipo = new TipoPagamento();
        $tipo['nome'] = $nome;
        $tipo->save();
    }

}
