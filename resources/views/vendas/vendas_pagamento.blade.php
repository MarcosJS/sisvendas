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
        <div id="formcheque" class="col-md-8 position-absolute w-50 p-1" hidden>

            <div class="row">
                <h3 class="col">Cheque</h3>
                <div class="col">
                    <button id="btncancel" class="btn btn-outline-danger float-right">Cancelar</button>
                </div>
            </div>
            <form class="col-md-12" action="/pagamentos/registrarcheque" method="post">
                {{csrf_field()}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="banco">Banco</label>
                        <input type="text" class="form-control" id="banco" placeholder="Nome do Banco">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="agencia">Agência</label>
                        <input type="text" class="form-control" id="agencia" placeholder="0000-0">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="contacorrente">Conta Corrente</label>
                        <input type="text" class="form-control" id="contacorrente" placeholder="00000-0">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="numerocheque">Numero do Cheque</label>
                        <input type="text" class="form-control" id="numerocheque" placeholder="000000" name="numerocheque">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="valor">Valor</label>
                        <input type="text" class="form-control" id="valor" placeholder="0,00" name="valor">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="vencimento">Vencimento</label>
                        <input type="date" class="form-control" id="vencimento">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="emissao">Emissão</label>
                        <input type="date" class="form-control" id="emissao">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="tipopessoa">Tipo de Pessoa</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="pessoalfisica" name="pessoafisica" class="custom-control-input">
                            <label class="custom-control-label" for="pessoafisica">Física</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="pessoaljuridica" name="pessoajuridica" class="custom-control-input">
                            <label class="custom-control-label" for="pessoajuridica">Jurídica</label>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cnpj-cpf">CNPJ/CPF</label>
                        <input type="text" class="form-control" id="cnpj-cpf" placeholder="000.000.000-00">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="emitente">Emitente</label>
                        <input type="text" class="form-control" id="emitente" placeholder="Nome do emitente do cheque">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="portador">Portador</label>
                        <input type="text" class="form-control" id="portador" placeholder="Nome do portador do cheque">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="observacoes">Observações</label>
                        <textarea class="form-control" name="observacoes" id="observacoes" rows="2"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btnform">Registrar</button>
            </form>

        </div>

    </div>
@endsection
