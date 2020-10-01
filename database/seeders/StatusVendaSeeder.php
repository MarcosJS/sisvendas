<?php

namespace Database\Seeders;

use App\Models\StatusVenda;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
        StatusVenda::factory()->count(3)
            ->state(new Sequence(
                ['nomestatus' => 'EM ANDAMENTO'],
                ['nomestatus' => 'CONCLUIDO'],
                ['nomestatus' => 'CANCELADO']
            ))
            ->create();
    }
}
