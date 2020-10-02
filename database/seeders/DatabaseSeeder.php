<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FuncaoSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(StatusVendaSeeder::class);
        $this->call(StatusPagamentoSeeder::class);
    }
}
