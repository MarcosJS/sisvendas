<?php

namespace Database\Seeders;

use App\Models\Funcao;
use Illuminate\Database\Seeder;

class FuncaoSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $funcao = new Funcao();
        $funcao->nomefuncao = 'ADMINISTRADOR DO SISTEMA';
        $funcao->nivel = 2;
        $funcao->save();
    }
}
