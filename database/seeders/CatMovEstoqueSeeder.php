<?php

namespace Database\Seeders;

use App\Models\Produto\CatMovEstoque;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CatMovEstoqueSeeder extends Seeder
{
    public function run()
    {
        CatMovEstoque::factory()->count(5)
            ->state(new Sequence(
                ['nome' => 'ENTRADA PRODUCAO'],
                ['nome' => 'ENTRADA ESTOQUE'],
                ['nome' => 'CANCELAMENTO VENDA'],
                ['nome' => 'VENDA'],
                ['nome' => 'BAIXA ESTOQUE']
            ))
            ->create();
    }
}
