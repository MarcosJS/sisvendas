@extends('layouts.master')

@section('titulo', 'SISVendas PDV - Pagamento')

@section('submenu')
    @include('menu_pdv')
@endsection

@section('conteudo')
    <div class="p-3"></div>
        <h1>Operação de Venda - Pagamento</h1>
        <div>
            <a href="/vendas/itens">Voltar</a>
            <a href="/vendas/cancelar">Cancelar</a>
        </div>

        <div>
            <table align="center">
                <tr>
                    <th>Cod. Produto</th>
                    <th>Nome do Produto</th>
                    <th>Quant</th>
                    <th>Preco Final</th>
                    <th>Subtotal</th>
                </tr>

                @if(count($venda->vendaItens) > 0)
                    @foreach($venda->vendaItens as $iten)
                        <tr>
                            <td>{{$iten->produto->id}}</td>
                            <td>{{$iten->produto->nome}}</td>
                            <td>{{$iten->qtd}}</td>
                            <td>{{$iten->precofinal}}</td>
                            <td>{{$iten->subtotal}}</td>
                        </tr>
                    @endforeach
                @endif

            </table>
        </div>
        <div>

                <form action="/vendas/revisar" method="post">
                    {{csrf_field()}}
                    <div class="form-row">

                        <div class="form-group">
                            <select id="cliente" class="form-control @error('cliente_ie') is-invalid @enderror" name="nomecliente">
                                <option selected value="" {{ (old("cliente_id") == "" ? "selected":"") }}>Clientes...</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id}}" {{ (old("cliente_id") == $cliente->id ? "selected":"") }}>{{$cliente->nome}}</option>
                                @endforeach
                            </select>
                            @error('cliente_id')
                            <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select id="metodopg" class="form-control @error('metodospg') is-invalid @enderror" name="metodospg">
                                <option selected value="" {{ (old("metodospg") == "" ? "selected":"") }}>Método de pagamento...</option>
                                @foreach($metodospg as $metodo)
                                    <option value="{{$metodo->id}}" {{ (old("codproduto") == $metodo->id ? "selected":"") }}>{{$metodo->nomemetodopagamento}}</option>
                                @endforeach
                            </select>
                            @error('metodospg')
                            <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                            @enderror
                        </div>

                        <br><input type="submit" value="Revisar e Confirmar"/>

                    </div>
                </form>

        </div>
@endsection
