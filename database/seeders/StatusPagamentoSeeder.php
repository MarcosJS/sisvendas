<?php

namespace Database\Seeders;

use App\Models\StatusPagamento;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
        StatusPagamento::factory()->count(4)
            ->state(new Sequence(
                ['nomestatuspagamento' => 'AGUARDANDO'],
                ['nomestatuspagamento' => 'PAGO'],
                ['nomestatuspagamento' => 'ESTORNADO']
            ))
            ->create();
    }
}
