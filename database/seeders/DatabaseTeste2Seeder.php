<?php

namespace Database\Seeders;

use Database\Seeders\Teste\ClienteTeste2Seeder;
use Database\Seeders\Teste\ProdutoTeste2Seeder;
use Illuminate\Database\Seeder;

class DatabaseTeste2Seeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('America/Recife');
        $this->call(ProdutoTeste2Seeder::class);
        $this->call(ClienteTeste2Seeder::class);
    }
}
