<?php

namespace Database\Seeders;

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
        $this->call(FuncaoTesteSeeder::class);
        $this->call(UsuarioTesteSeeder::class);
        $this->call(ProdutoSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(VendaSeeder::class);
    }
}
