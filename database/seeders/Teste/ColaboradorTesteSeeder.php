<?php

namespace Database\Seeders\Teste;

use App\Models\Cliente\Cliente;
use App\Models\Colaborador\Colaborador;
use App\Models\Endereco;
use App\Models\Telefone;
use Illuminate\Database\Seeder;

class ColaboradorTesteSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Colaborador::factory()->count(1)
            ->state(['funcao_id' => 1])
            ->has(Endereco::factory())
            ->has(Telefone::factory()->count(1))
            ->create();
    }
}
