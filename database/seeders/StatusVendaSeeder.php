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
        $status->nomestatus = 'CONCLUIDO';
        $status->save();

        $status = new StatusVenda();
        $status->nomestatus = 'CANCELADO';
        $status->save();
        /*StatusVenda::factory()->count(3)
            ->state(new Sequence(
                ['nomestatus' => 'EM ANDAMENTO'],
                ['nomestatus' => 'CONCLUIDO'],
                ['nomestatus' => 'CANCELADO']
            ))
            ->create();*/
    }
}
