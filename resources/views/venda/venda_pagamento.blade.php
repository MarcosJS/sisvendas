@extends('layouts.conteudo_op_venda')

@section('titulo', 'SISVendas PDV - Pagamento')

@section('titulo_conteudo')
    <div id="telapagamento" class="row">
        <h4>Operação de Venda - Pagamento</h4>
    </div>
@endsection

@section('conteudo_view')
    <div class="row mt-3">
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
                    <td class="text-right"><input id="novodesconto" class="form-control text-right" type="text" value="{{$venda->descPorcent()}}" name="novodesconto"></td>
                </tr>
                <tr class="bg-success">
                    <td colspan="4" class="text-right"><b>LÍQUIDO R$:</b></td>
                    <td id="totalliq" class="text-right"><b>{{$venda->totalliq}}</b></td>
                </tr>
            </table>

            <form action="{{route('aplicardesconto')}}" method="post">
            {{csrf_field()}}
                <input id="desconto" type="hidden" value="{{$venda->descPorcent()}}" name="desconto">

                <div class="form-row justify-content-center">
                    <button type="submit" class="btn btnform">Aplicar</button>
                </div>
            </form>
        </div>

        <div class="col-sm-6 mt-3">
            <div class="form-group">
                <label class="sr-only" for="cliente">Cliente</label>
                @if($cliente != null)
                    <input type="text" class="form-control @error('cliente') is-invalid @enderror" id="cliente" placeholder="Cliente" value="{{$cliente->cpf}} - {{$cliente->nome}}" readonly>
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
        </div>
    </div>

    @if(count($pagamentos)> 0)
        <div class="row border rounded mt-3 border-success">
            <h4>Pagamentos</h4>
            <table class="table table-sm table-hover table-success mb-0">
                <tr>
                    <th>Valor R$</th>
                    <th>Tipo</th>
                    <th>Data</th>
                    <th></th>
                </tr>
                @foreach($pagamentos as $pag)
                    @include('pagamentos.pagamento')
                @endforeach
            </table>
        </div>
    @endif


    <!-- TELAS DE FORMULÁRIOS DE PAGAMENTO -->
    @include('venda.lista_clientes')
    @include('pagamentos.form_cheque')
@endsection
