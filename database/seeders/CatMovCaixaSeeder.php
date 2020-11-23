<?php

namespace Database\Seeders;

use App\Models\Caixa\CatMovCaixa;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CatMovCaixaSeeder extends Seeder
{
    public function run()
    {
        CatMovCaixa::factory()->count(4)
            ->state(new Sequence(
                ['nome' => 'SUPRIMENTO'],
                ['nome' => 'SANGRIA'],
                ['nome' => 'RECEBIMENTO'],
                ['nome' => 'ESTORNO']
            ))
            ->create();
    }
}
