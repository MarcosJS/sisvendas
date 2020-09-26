<?php

namespace Database\Seeders;

use App\Models\MetodoPagamento;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class MetodoPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        MetodoPagamento::factory()->count(3)
            ->state(new Sequence(
                ['nomemetodopagamento' => 'DINHEIRO'],
                ['nomemetodopagamento' => 'CARTAO'],
                ['nomemetodopagamento' => 'CHEQUE'],
                ['nomemetodopagamento' => 'CREDITO']
            ))
            ->create();
    }
}
