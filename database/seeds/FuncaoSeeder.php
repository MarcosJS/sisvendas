<?php

use App\Funcao;
use Illuminate\Database\Seeder;

class FuncaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
