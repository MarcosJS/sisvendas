<?php

namespace Database\Seeders;

use App\Models\StatusVenda;
use Illuminate\Database\Seeder;

class StatusVendaSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $status = new StatusVenda();
        $status->nomestatus = 'EM ANDAMENTO';
        $status->save();

        $status = new StatusVenda();
        $status->nomestatus = 'CONCLUIDA';
        $status->save();

        $status = new StatusVenda();
        $status->nomestatus = 'EM ABERTO';
        $status->save();

        $status = new StatusVenda();
        $status->nomestatus = 'CANCELADA';
        $status->save();
    }
}
