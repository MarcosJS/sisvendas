<?php

namespace Database\Seeders;

use App\Models\Cliente\CatMovCredCliente;
use Illuminate\Database\Seeder;

class CatMovCredClienteSeeder extends Seeder
{
    public function run()
    {
        $this->newCatMovCredCliente('CREDITO PAGAMENTO');
        $this->newCatMovCredCliente('DEBITO PAGAMENTO');
    }

    private function newCatMovCredCliente($nome) {
        $tipo = new CatMovCredCliente();
        $tipo->nome = $nome;
        $tipo->save();
    }
}
