<?php

namespace Database\Seeders;

use App\Models\Pagamento\StatusPagamento;
use Illuminate\Database\Seeder;

class StatusPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $this->newStatusPagamento('AGUARDANDO');
        $this->newStatusPagamento('PAGO');
        $this->newStatusPagamento('DEVOLVIDO');
    }

    public function newStatusPagamento($nome) {
        $status = new StatusPagamento();
        $status->nomestatus = $nome;
        $status->save();
    }
}
