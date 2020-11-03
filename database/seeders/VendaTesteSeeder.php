<?php

namespace Database\Seeders;

use App\Models\Pagamento\Cheque;
use App\Models\Pagamento\Emitente;
use App\Models\Pagamento\Pagamento;
use App\Models\Venda;
use App\Models\VendaItem;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class VendaTesteSeeder extends Seeder
{
    public function run()
    {
        $vendas = Venda::factory()->count(50)->make();

        //Atualização de valores de cada venda
        foreach ($vendas as $venda) {
            $venda->usuario()->associate(random_int(1, 3));
            $venda->cliente()->associate(random_int(1, 4));
            $venda->statusVenda()->associate(2);
            $venda->save();
            $itens = VendaItem::factory()->count(random_int(1,5))->make();
            $venda->vendaItens()->saveMany($itens);
            $venda->atualizarValores();
        }

        $vendaItens = VendaItem::all();
        foreach ($vendaItens as $item) {
            $produto = $item->produto;
            $produto->addMovEstoque('SAIDA', 'VENDA', -$item->qtd, $item->venda->dtvenda, $item->venda->usuario->id);
        }

        foreach ($vendas as $venda) {
            $pagamento = Pagamento::factory()
                ->state(['tipo' => 'CHEQUE', 'valor' => $venda->totalliq])
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
