<?php

namespace Database\Seeders;

use App\Models\Funcao;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioTesteSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        for($i = 2; $i <= 3; $i++) {
            $usuario = Usuario::factory()->make();
            $usuario->password = Hash::make('11112222');
            $funcao = Funcao::find($i);
            $funcao->usuarios()->saveMany([$usuario]);
        }
    }
}
