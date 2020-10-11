@extends('layouts.master')

@section('titulo', 'SISVendas PDV - Pagamento')

@section('submenu')
    @include('menu_pdv')
@endsection

@section('conteudo')
    <div class="container p-3">
        <div>
            <h1>Operação de Venda - Pagamento</h1>
            <a href="{{route('itens')}}">Voltar</a>
            <a href="{{route('cancelar')}}">Cancelar</a>
        </div>

        <div class="row">
            <div class="col border rounded">
                <table class="table table-sm">
                    <tr>
                        <th>Cod. Produto</th>
                        <th>Nome do Produto</th>
                        <th>Quant</th>
                        <th>Preco Final</th>
                        <th class="text-right">Subtotal</th>
                    </tr>

                    @if(count($venda->vendaItens) > 0)
                        @foreach($venda->vendaItens as $iten)
                            <tr>
                                <td>{{$iten->produto->id}}</td>
                                <td>{{$iten->produto->nome}}</td>
                                <td>{{$iten->qtd}}</td>
                                <td>{{$iten->precofinal}}</td>
                                <td class="text-right">{{$iten->subtotal}}</td>
                            </tr>
                        @endforeach
                    @endif
                    <tr >
                        <td colspan="4" class="text-right"><b>Total R$:</b></td>
                        <td id="totalprodutos" class="text-right">{{$venda->totalprodutos}}</td>
                    </tr>
                    <tr >
                        <td colspan="4" class="text-right"><label for="novodesconto"><b>Desconto %:</b></label></td>
                        <td class="text-right"><input id="novodesconto" class="form-control text-right" type="text" value="{{$venda->descPorcent()}}"></td>
                    </tr>
                    <tr class="bg-success">
                        <td colspan="4" class="text-right"><b>LÍQUIDO R$:</b></td>
                        <td id="totalliq" class="text-right"><b>{{$venda->totalliq}}</b></td>
                    </tr>
                </table>
            </div>

            <div class="col-sm-6">
                <form action="{{ route('revisarpagamento') }}" method="post">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="sr-only" for="cliente">Cliente</label>
                        @if($cliente != null)
                            <input type="text" class="form-control @error('cliente') is-invalid @enderror" id="cliente" placeholder="Cliente" value="{{$cliente->nome}}" readonly>
                        @else
                            <input type="text" class="form-control @error('cliente') is-invalid @enderror" id="cliente" placeholder="Cliente" value="" readonly>
                        @endif
                        @error('cliente')
                        <span>
                            <small class="text-danger">{{$message}}</small>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="metodopg">Método de Pagamento</label>
                        <select id="metodopg" class="form-control @error('pagamento') is-invalid @enderror" name="pagamento">
                            <option selected value="" {{ (old("pagamento") == "" ? "selected":"") }}>Método de pagamento...</option>
                            @foreach($metodospg as $metodo)
                                <option value="{{$metodo['id']}}" {{ (old("pagamento") == $metodo['id'] ? "selected":"") }}>{{$metodo['nomemetodopagamento']}}</option>
                            @endforeach
                        </select>
                        @error('pagamento')
                        <span>
                            <small class="text-danger">{{$message}}</small>
                        </span>
                        @enderror
                    </div>
                    @if($cliente != null)
                        <input type="hidden" name="cliente" value="{{$cliente->id}}">
                    @else
                        <input type="hidden" name="cliente" value="">
                    @endif
                    <input type="hidden" value="{{$venda->id}}" name="venda">
                    <input id="desconto" type="hidden" value="{{$venda->descPorcent()}}" name="desconto">


                    <div class="form-row justify-content-center">
                        <button type="submit" class="btn btnform">Revisar</button>
                    </div>
                </form>
            </div>
        </div>

        @foreach($pagamentos as $pagamento)
            <div class="row justify-content-center">
                @include('pagamentos.'.$pagamento->tipo)
            </div>
            @endforeach


        <!-- TELAS DE FORMULÁRIOS DE PAGAMENTO -->
        @include('pagamentos.lista_clientes')
        @include('pagamentos.form_cheque')

    </div>
@endsection
