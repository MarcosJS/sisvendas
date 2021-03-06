<?php

namespace Database\Seeders;

use App\Models\Funcao;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new Usuario();
        $usuario->nome = 'Admin';
        $usuario->email =  'admin@sisvendas';
        $usuario->password = Hash::make('admin1234');
        $usuario->cpf =  '00011122233';

        $funcao = Funcao::find(1);
        $funcao->usuarios()->saveMany([$usuario]);
    }
}
