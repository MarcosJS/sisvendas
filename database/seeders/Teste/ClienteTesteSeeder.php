<?php

namespace Database\Seeders\Teste;

use App\Models\Cliente\Cliente;
use App\Models\Endereco;
use App\Models\Telefone;
use Illuminate\Database\Seeder;

class ClienteTesteSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Cliente::factory()->count(4)
            ->has(Endereco::factory())
            ->has(Telefone::factory()->count(2))
            ->create();
    }
}
