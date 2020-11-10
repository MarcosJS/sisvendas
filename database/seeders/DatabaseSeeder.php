<?php

namespace Database\Seeders;

use App\Models\Caixa\StatusTurno;
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
        $this->call(StatusVendaSeeder::class);
        $this->call(StatusPagamentoSeeder::class);
        $this->call(StatusTurnoSeeder::class);
    }
}
