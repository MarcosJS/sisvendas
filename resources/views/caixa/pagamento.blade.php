@extends('layouts.painel_caixa')

@section('titulo', 'SISVendas PDV - Caixa')

@section('conteudo_view')

    @include('caixa._cabecalho_caixa')

    @include('caixa._errors')

    <div class="row mt-3">
        <div class="col-sm-6 pb-1">

            @if($venda->cliente != null)
                <div>
                    <b>Cliente: {{$venda->cliente->nome}}</b>
                    <b>CPF: {{$venda->cliente->cpf}}</b>
                </div>
            @elseif($venda->nomecliente != null)
                <div>
                    <b>Cliente: {{$venda->nomecliente}}</b>
                </div>
            @endif

            @include('pagamentos._pagamentos_venda')
            @include('pagamentos._vales_venda')

        </div>

        <div class="col border rounded">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-5">
                        <b>Venda: {{$venda->id}}</b>
                    </div>

                    <div class="col-sm-7 col-auto">
                        @if(count($venda->vendaItens) > 0)
                            <button type="button" class="btn btn-link float-right" data-toggle="modal" data-target="#form_desconto">
                                Desconto
                            </button>
                            @if($venda->cliente != null && $venda->cliente->saldoCredito() > 0)
                                <button type="button" class="btn btn-danger float-right shadow-sm" data-toggle="modal" data-target="#form_credito">
                                    Alterar Crédito Cliente
                                </button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

            @include('caixa._itens_caixa')
            <input id="areceber_venda" type="hidden" value="{{$venda->aReceber()}}">
        </div>
    </div>

    @include('caixa._modal_desconto_caixa')
    @include('pagamentos.form_cheque')
    @include('pagamentos.form_dinheiro')
    @include('pagamentos.form_vale')
@endsection

@section('rodape')
    <div class="container">
        @include('caixa._info_itens_caixa')

        @include('caixa._pagamento_menu')
    </div>
@endsection
