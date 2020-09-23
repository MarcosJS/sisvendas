<?php

use App\Funcao;
use App\Usuario;
use Illuminate\Database\Seeder;

class UsuarioTesteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 2; $i <= 3; $i++) {
            $usuario = factory(Usuario::class)->make();
            $funcao = Funcao::find($i);
            $funcao->usuarios()->saveMany([$usuario]);
        }
    }
}
