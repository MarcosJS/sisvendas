<?php

namespace Database\Seeders;

use App\Models\Caixa\TipoMovCaixa;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class TipoMovCaixaSeeder extends Seeder
{
    public function run()
    {
        TipoMovCaixa::factory()->count(2)
            ->state(new Sequence(
                ['nome' => 'ENTRADA'],
                ['nome' => 'SAIDA']
            ))
            ->create();
    }

}
