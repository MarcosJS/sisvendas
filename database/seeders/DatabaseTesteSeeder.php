<?php

namespace Database\Seeders;

use Database\Seeders\Teste\ClienteTesteSeeder;
use Database\Seeders\Teste\ColaboradorTesteSeeder;
use Database\Seeders\Teste\FuncaoTesteSeeder;
use Database\Seeders\Teste\ProdutoTesteSeeder;
use Database\Seeders\Teste\UsuarioTesteSeeder;
use Database\Seeders\Teste\VendaTesteSeeder;
use Illuminate\Database\Seeder;

class DatabaseTesteSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('America/Recife');
        $this->call(FuncaoTesteSeeder::class);
        $this->call(UsuarioTesteSeeder::class);
        $this->call(ProdutoTesteSeeder::class);
        $this->call(ClienteTesteSeeder::class);
        $this->call(ColaboradorTesteSeeder::class);
        $this->call(VendaTesteSeeder::class);
    }
}
