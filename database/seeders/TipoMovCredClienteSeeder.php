<?php

namespace Database\Seeders;

use App\Models\Cliente\TipoMovCredCliente;
use Illuminate\Database\Seeder;

class TipoMovCredClienteSeeder extends Seeder
{
    public function run() {
        $this->newTipoMovCredCliente('ENTRADA');
        $this->newTipoMovCredCliente('SAIDA');
    }

    private function newTipoMovCredCliente($nome) {
        $tipo = new TipoMovCredCliente();
        $tipo->nome = $nome;
        $tipo->save();
    }

}
