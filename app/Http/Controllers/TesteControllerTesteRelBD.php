<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Endereco;
use App\Produto;
use App\Telefone;
use App\Usuario;
use App\Venda;
use App\VendaItem;
use Illuminate\Http\Request;

class TesteControllerTesteRelBD extends Controller
{
    public function relBD() {
        $usuarios = Usuario::all();
        $clientes = Cliente::all();
        $telefones = Telefone::all();
        $enderecos = Endereco::all();
        $produtos = Produto::all();
        $vendaItens = VendaItem::all();
        $vendas = Venda::all();
        return view('debug',['usuarios'=>$usuarios,
        'clientes'=>$clientes,
        'telefones'=>$telefones,
        'enderecos'=>$enderecos,
        'produtos'=>$produtos,
        'vendaItens'=>$vendaItens,
        'vendas'=>$vendas]);
    }
}
