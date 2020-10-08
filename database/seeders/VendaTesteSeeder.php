<?php

namespace Database\Seeders;

use App\Models\Pagamento\Cheque;
use App\Models\Pagamento\Emitente;
use App\Models\Pagamento\PagamentoCheque;
use App\Models\Venda;
use App\Models\VendaItem;
use Illuminate\Database\Seeder;

class VendaTesteSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $vendas = Venda::factory()->count(5)
            ->state([
                'usuario_id'=>1,
                'cliente_id'=>2,
                'status_venda_id' => 1])
            ->has(VendaItem::factory()->count(5), 'vendaItens')
            ->create();

        foreach ($vendas as $venda) {
            $pagamento = PagamentoCheque::factory()->make();
            $pagamento->venda()->associate($venda);
            $pagamento->save();
            $cheque = Cheque::factory()->make();
            $cheque->pagamento()->associate($pagamento);
            $cheque->save();
            $emitente = Emitente::factory()->make();
            $cheque->emitente()->save($emitente);
        }
    }
}
