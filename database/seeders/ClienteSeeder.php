<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Telefone;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
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
