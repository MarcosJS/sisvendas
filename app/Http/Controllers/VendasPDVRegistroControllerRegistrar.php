<?php

namespace App\Http\Controllers;

use App\Auxiliar\CookieAuxiliarDadosItens;
use App\Cliente;
use App\Produto;
use App\Usuario;
use App\Venda;
use App\VendaItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class VendasPDVRegistroControllerRegistrar extends Controller
{
    public function registrar(Request $request)
    {
        /*1 - Buscando os dados no cookie para VendaItem*/
        $cooks = $request->cookie('itens');
        if (!$cooks) {
            return redirect('sisvendaspdvitens');
        }
        $itens = CookieAuxiliarDadosItens::converteParaArray($cooks);

        /*2 - Inicializando VendaItem e recuperando os produtos*/
        $vendaItens = array();
        $produtos = array();
        foreach ($itens as $item) {
            $vendaItem = new VendaItem();
            $vendaItem->qtd = $item['qtd'];
            $vendaItem->precofinal = $item['precofinal'];
            $vendaItem->subtotal = $item['subtotal'];
            $vendaItens[] = $vendaItem;
            $produtos[] = Produto::find($item['codproduto']);
        }
        //return $produtos;

        /*3 - Inicializando e associando Venda ao Usuario e Cliente*/
        /*3.1 - Inicializando Venda*/
        $venda = new Venda();
        $venda->fill($request->all());
        $venda->desconto = 1;
        /*3.2 - Buscando usuario e cliente*/
        $cliente = Cliente::find($request->idcliente);
        $usuario = Usuario::find($request->idusuario);
        /*3.3 - Associando Cliente e Usuario a Venda*/
        $venda->usuario()->associate($usuario);
        $venda->cliente()->associate($cliente);
        $venda->save();


        /*5 - Relacionando VendaItem à Produto*/
        for($i = 0; $i <= count($produtos)-1; $i++) {
            $vendaItens[$i]->produto()->associate($produtos[$i]);
        }
        /*4 - Relacionando VendaItem à Venda*/
        $venda->vendaItens()->saveMany($vendaItens);

        Cookie::queue(Cookie::forget('itens'));
        return redirect('/');
    }
}
