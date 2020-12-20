<?php

namespace Database\Seeders;

use App\Models\Caixa\StatusTurno;
use Illuminate\Database\Seeder;

class StatusTurnoSeeder extends Seeder
{
    public function run()
    {
        $this->newStatusTurno('ABERTO');
        $this->newStatusTurno('FECHADO');
    }

    public function newStatusTurno($nome) {
        $status = new StatusTurno();
        $status->nome = $nome;
        $status->save();
    }
}
