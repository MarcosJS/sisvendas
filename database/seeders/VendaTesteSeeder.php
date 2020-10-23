<?php

namespace Database\Seeders;

use App\Models\Pagamento\Cheque;
use App\Models\Pagamento\Emitente;
use App\Models\Pagamento\Pagamento;
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
                'valida' => true,
                'usuario_id' => 1,
                'cliente_id' => 2,
                'status_venda_id' => 2])
            ->has(VendaItem::factory()->count(5), 'vendaItens')
            ->create();

        $vendaItens = VendaItem::all();
        foreach ($vendaItens as $itens) {
            $produto = $itens->produto;
            $produto->estoque -= $itens->qtd;
            $produto->save();
        }

        foreach ($vendas as $venda) {
            $pagamento = Pagamento::factory()
                ->state(['tipo' => 'CHEQUE'])
                ->make();
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
