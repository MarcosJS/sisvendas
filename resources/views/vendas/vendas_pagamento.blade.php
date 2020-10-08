@extends('layouts.master')

@section('titulo', 'SISVendas PDV - Pagamento')

@section('submenu')
    @include('menu_pdv')
@endsection

@section('conteudo')
    <div class="p-3">
        <h1>Operação de Venda - Pagamento</h1>
        <div>
            <a href="/vendas/itens">Voltar</a>
            <a href="/vendas/cancelar">Cancelar</a>
        </div>

        <div class="row justify-content-center">
            <table class="table col-4" align="center">
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
                            <td align="right">{{$iten->subtotal}}</td>
                        </tr>
                    @endforeach
                @endif
                <tr >
                    <td colspan="4" align="right"><b>Total R$:</b></td>
                    <td id="totalprodutos" align="right">{{$venda->totalprodutos}}</td>
                </tr>
                <tr >
                    <td colspan="4" align="right"><b>Desconto %:</b></td>
                    <td align="right"><input id="novodesconto" class="form-control" type="text" value="{{$venda->descPorcent()}}"></td>
                </tr>
                <tr class="bg-success">
                    <td colspan="4" align="right"><b>LÍQUIDO R$:</b></td>
                    <td id="totalliq" align="right"><b>{{$venda->totalliq}}</b></td>
                </tr>

            </table>
        </div>

        <div class="row justify-content-center">

            <form action="/vendas/revisar" method="post">
                {{csrf_field()}}
                <div class="form-row">
                    <div class="form-group">
                        <select id="cliente" class="form-control @error('cliente_id') is-invalid @enderror" name="cliente">
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
                        <select id="metodopg" class="form-control @error('metodopagamento') is-invalid @enderror" name="metodopagamento">
                            <option selected value="" {{ (old("metodopagamento") == "" ? "selected":"") }}>Método de pagamento...</option>
                            @foreach($metodospg as $metodo)
                                <option value="{{$metodo['id']}}" {{ (old("metodopagamento") == $metodo['id'] ? "selected":"") }}>{{$metodo['nomemetodopagamento']}}</option>
                            @endforeach
                        </select>
                        @error('metodopagamento')
                        <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                        @enderror
                    </div>
                    <input id="desconto" class="form-control" type="hidden" value="{{$venda->descPorcent()}}" name="desconto">
                </div>
                <div class="form-row justify-content-center">
                    <button type="submit" class="btn btnform">Revisar</button>
                </div>
            </form>
        </div>

        <div class="row justify-content-center">
            @if(count($venda->pagamentos) > 0)
                <small class="text-success">Cheque de R$ {{$venda->pagamentos[0]->valor}} registrado com sucesso!</small>
            @endif
        </div>

        <!-- TELAS DE FORMULÁRIOS DE PAGAMENTO -->
            @include('vendas.form_cheque')

    </div>
@endsection
