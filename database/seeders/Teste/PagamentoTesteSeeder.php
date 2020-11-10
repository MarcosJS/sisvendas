<?php


namespace Database\Seeders\Teste;

use App\Models\Pagamento\Pagamento;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class PagamentoTesteSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Pagamento::factory()->count(3)
            ->state(new Sequence(
                ['nomemetodopagamento' => 'DINHEIRO'],
                ['nomemetodopagamento' => 'CARTAO'],
                ['nomemetodopagamento' => 'CHEQUE'],
                ['nomemetodopagamento' => 'CREDITO']
            ))
            ->create();
    }
}
