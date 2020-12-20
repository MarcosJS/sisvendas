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
        $this->newStatusVenda('EM ANDAMENTO');
        $this->newStatusVenda('CONCLUIDA');
        $this->newStatusVenda('EM ABERTO');
        $this->newStatusVenda('CANCELADA');
    }

    public function newStatusVenda($nome) {
        $status = new StatusVenda();
        $status->nome = $nome;
        $status->save();
    }
}
