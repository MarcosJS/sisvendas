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
        date_default_timezone_set('America/Recife');
        $this->call(FuncaoSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(TipoMovEstoqueSeeder::class);
        $this->call(CatMovEstoqueSeeder::class);
        $this->call(TipoMovEstoqueMatSeeder::class);
        $this->call(CatMovEstoqueMatSeeder::class);
        $this->call(StatusVendaSeeder::class);
        $this->call(StatusPagamentoSeeder::class);
        $this->call(StatusTurnoSeeder::class);
        $this->call(TipoMovSalarioSeeder::class);
        $this->call(TipoMovCaixaSeeder::class);
        $this->call(CatMovSalarioSeeder::class);
        $this->call(CatMovCaixaSeeder::class);
        $this->call(CaixaSeeder::class);
        $this->call(TipoMovCredClienteSeeder::class);
        $this->call(CatMovCredClienteSeeder::class);
        $this->call(TipoPagamentoSeeder::class);
    }
}
