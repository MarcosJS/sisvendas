<?php

namespace Database\Seeders\Teste;

use App\Models\Caixa\Caixa;
use App\Models\Pagamento\Cheque;
use App\Models\Pagamento\Emitente;
use App\Models\Pagamento\Pagamento;
use App\Models\Pagamento\Transferencia;
use App\Models\Usuario;
use App\Models\Venda;
use App\Models\VendaItem;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendaTesteSeeder extends Seeder
{
    public function run()
    {
        $vendas = Venda::factory()->count(50)->make();

        //Complementação dos dados das vendas
        foreach ($vendas as $venda) {
            $venda->usuario()->associate(random_int(1, 3));
            $venda->cliente()->associate(random_int(1, 4));
            $venda->statusVenda()->associate(2);
            $venda->save();
        }

        //Atualização de valores de cada venda
        $vendas = Venda::all();
        foreach ($vendas as $venda) {
            $itens = VendaItem::factory()->count(random_int(1,5))->make();
            $venda->vendaItens()->saveMany($itens);
            $venda->atualizarValores();
        }

        $vendaItens = VendaItem::all();
        foreach ($vendaItens as $item) {
            $produto = $item->produto;
            $produto->addMovEstoque(2, 4, -$item->qtd, $item->venda->dtvenda, $item->venda->usuario->id);
        }

        $caixa = Caixa::first();
        $usuario = Usuario::find(1);

        $caixa->abrir($usuario);
        for ($i = 0; $i < 15 ; $i++) {
            $pagamento = Pagamento::factory()
                ->state(['valor' => $vendas[$i]->totalliq])
                ->make();
            $pagamento->tipoPagamento()->associate(2);
            $pagamento->venda()->associate($vendas[$i]);
            $pagamento->concluir($caixa, $usuario);
            $cheque = Cheque::factory()->make();
            $cheque->pagamento()->associate($pagamento);
            $cheque->save();
            $emitente = Emitente::factory()->make();
            $cheque->emitente()->save($emitente);
        }

        for ($i = 15; $i < 30; $i++) {
            $pagamento = Pagamento::factory()
                ->state(['valor' => $vendas[$i]->totalliq])
                ->make();
            $pagamento->tipoPagamento()->associate(1);
            $pagamento->venda()->associate($vendas[$i]);
            $pagamento->concluir($caixa, $usuario);
        }

        for ($i = 30; $i < 50; $i++) {
            $pagamento = Pagamento::factory()
                ->state(['valor' => $vendas[$i]->totalliq])
                ->make();
            $pagamento->tipoPagamento()->associate(3);
            $pagamento->venda()->associate($vendas[$i]);
            $pagamento->concluir($caixa, $usuario);
            $transferencia = Transferencia::factory()->make();
            $transferencia->pagamento()->associate($pagamento);
            $transferencia->save();
        }
        $caixa->fechar();
    }
}
