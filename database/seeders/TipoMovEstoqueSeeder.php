<?php

namespace Database\Seeders;

use App\Models\Produto\TipoMovEstoque;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class TipoMovEstoqueSeeder extends Seeder
{
    public function run()
    {
        TipoMovEstoque::factory()->count(2)
            ->state(new Sequence(
                ['nome' => 'ENTRADA'],
                ['nome' => 'SAIDA']
            ))
            ->create();
    }

}
