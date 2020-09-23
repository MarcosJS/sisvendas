<?php

use App\Funcao;
use App\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new Usuario();
        $usuario->nome = 'Admin';
        $usuario->email =  'admin@sisvendas';
        $usuario->senha = Hash::make('sisvendasadmin');
        $usuario->cpf =  '00011122233';

        $funcao = Funcao::find(1);
        $funcao->usuarios()->saveMany([$usuario]);
    }
}
