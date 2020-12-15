<?php

namespace Database\Seeders\Teste;

use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Telefone;
use Illuminate\Database\Seeder;

class ClienteTeste2Seeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $cliente = new Cliente();
        $cliente->nome ='Fulano de Tal';
        $cliente->datanasc = date("Y-m-d");
        $cliente->cpf = '00022288855';
        $cliente->save();
    }
}
