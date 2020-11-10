<?php

namespace Database\Seeders;

use App\Models\Caixa\StatusTurno;
use Illuminate\Database\Seeder;

class StatusTurnoSeeder extends Seeder
{
    public function run()
    {
        $status = new StatusTurno();
        $status->nome = 'ABERTO';
        $status->save();

        $status = new StatusTurno();
        $status->nome = 'FECHADO';
        $status->save();
    }
}
