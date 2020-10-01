@extends('layouts.master')

@section('titulo', 'SISVendas PDV - Pagamento')

@section('submenu')
@include('menu_pdv')
@endsection

@section('conteudo')
    <div class="p-3">

        <h1>Operação de Venda - Revisão</h1>
        <div>
            <a href="/vendas/pagamento">Voltar</a>
            <a href="/vendas/cancelar">Cancelar</a>
        </div>

        <div>
            <table class="table" align="center">
                <tr>
                    <th>Cod. Produto</th>
                    <th>Nome do Produto</th>
                    <th>Quant</th>
                    <th>Preco Final</th>
                    <th>Subtotal</th>
                </tr>

                @if(count($itens) > 0)
                    @foreach($itens as $iten)
                        <tr>
                            <td>{{$iten->id}}</td>
                            <td>{{$iten->nome}}</td>
                            <td>{{$iten->qtd}}</td>
                            <td>{{$iten->precofinal}}</td>
                            <td>{{$iten->subtotal}}</td>
                        </tr>
                    @endforeach
                @endif

            </table>
        </div>

        <form action="/vendas/registrar" method="post">
            {{csrf_field()}}
            <div class="form">
                <table class="table">
                    <tr><td>Id do Cliente: </td><td><input type="text" name="idcliente" value="{{$cliente->id}}" readonly="true"/></td></tr>
                    <tr><td>Nome do Cliente: </td><td><input type="text" name="nomecliente" value="{{$cliente->nome}}" readonly="true"></td></tr>
                    <tr><td>Data da Venda: </td><td><input type="text" name="dtvenda" value="{{$venda->dtvenda}}" readonly="true"/></td></tr>
                    <tr><td>Hora da Venda: </td><td><input type="text" name="hrvenda" value="{{$venda->hrvenda}}" readonly="true"/></td></tr>
                    <tr><td>Total dos Produtos: </td><td><input type="text" name="totalprodutos" value="{{$venda->totalprodutos}}" readonly="true"/></td></tr>
                    <tr><td>Total Líquido: </td><td><input type="text" name="totalliq" value="{{$venda->totalliq}}" readonly="true"/></td></tr>
                    <tr><td>Método de Pagamento: </td><td><input type="text" name="metodopg" value="{{$venda->metodopagamento->nomemetodopagamento}}" readonly="true"/></td></tr>
                </table>

                <input type="hidden" value="{{$venda->id}}" name="venda_id">
                <input type="submit" value="Concluir"/>
            </div>

        </form>

    </div>
@endsection
