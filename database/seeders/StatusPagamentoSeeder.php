<?php

namespace Database\Seeders;

use App\Models\Pagamento\StatusPagamento;
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
        StatusPagamento::factory()->count(3)
            ->state(new Sequence(
                ['nomestatus' => 'AGUARDANDO'],
                ['nomestatus' => 'PAGO'],
                ['nomestatus' => 'ESTORNADO']
            ))
            ->create();
    }
}
