<?php

namespace Database\Seeders\Teste;

use App\Models\Funcao;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class FuncaoTesteSeeder extends Seeder
{
    public function run()
    {
        Funcao::factory()->count(3)
            ->state(new Sequence(
                ['nomefuncao' => 'VENDEDOR'],
                ['nomefuncao' => 'GERENTE', 'nivel' => 2],
                ['nomefuncao' => 'CONTROLADOR DE ESTOQUE']
            ))
            ->create();
    }
}
