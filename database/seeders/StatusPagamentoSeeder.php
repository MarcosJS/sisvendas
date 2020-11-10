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
        $status = new StatusPagamento();
        $status->nomestatus = 'AGUARDANDO';
        $status->save();

        $status = new StatusPagamento();
        $status->nomestatus = 'PAGO';
        $status->save();

        $status = new StatusPagamento();
        $status->nomestatus = 'ESTORNADO';
        $status->save();
    }
}
