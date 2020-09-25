<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Produto;
use App\Models\Telefone;
use App\Models\Usuario;
use App\Models\Venda;
use App\Models\VendaItem;
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
