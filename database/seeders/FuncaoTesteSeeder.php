<?php

namespace Database\Seeders;

use App\Models\Funcao;
use Illuminate\Database\Seeder;

class FuncaoTesteSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $funcao = new Funcao();
        $funcao->nomefuncao = 'GERENTE';
        $funcao->nivel = 2;
        $funcao->save();

        $funcao = new Funcao();
        $funcao->nomefuncao = 'VENDEDOR';
        $funcao->nivel = 1;
        $funcao->save();
    }
}
