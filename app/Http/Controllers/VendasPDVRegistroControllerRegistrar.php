<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Produto;
use App\Venda;
use App\VendaItem;
use Illuminate\Http\Request;

class VendasPDVRegistroControllerRegistrar extends Controller
{
    public function registrar(Request $request)
    {

        /*Preparando os dados para VendaItem*/
        $cooks = $request->cookie('itens');
        if (!$cooks) {
            return redirect('sisvendapdvitens');
        }
        $dadosBrutos = explode("*", $cooks);
        $dados = [];
        for ($i = 0; $i < count($dadosBrutos) - 1; $i++) {
            $dados[] = explode("-", $dadosBrutos[$i]);
        }

        /*Inicializando VendaItem e recuperando os produtos*/

        $vendaItens = array();
        foreach ($dados as $dado) {
            $vendaItem = new VendaItem();
            $vendaItem->qtd = $dado[2];
            $vendaItem->precofinal = $dado[3];
            $vendaItem->subtotal = $dado[4];
            $produto = Produto::find($dado[0])->vendaItens()->save($vendaItem);
            //$produto->vendaItens()->save($vendaItem);
            $vendaItens[] = $vendaItem;
        }

        /*Inicializando e associando Venda*/
        $venda = new Venda();
        $venda->fill($request->all());
        $venda->desconto = 1;

        /*Buscando usuario e cliente*/
        $cliente = Cliente::find($request->idcliente);
        $usuario= Usuario::find($request->idusuario);
        $venda->usuario()->associate($usuario);
        $venda->cliente()->associate($cliente);
        $venda->save();

        /*Relacionando itens em Venda*/
        foreach ($vendaItens as $vendaItem) {
            $venda->vendaItens()->saveMany($vendaItem);
        }

        return redirect('/');

    }
}
