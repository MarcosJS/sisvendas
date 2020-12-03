@extends('layouts.painel_caixa')

@section('titulo', 'SISVendas PDV - Caixa')

@section('titulo_conteudo')
    <div id="caixa" class="row">
        <h4>Caixa</h4>
    </div>
@endsection

@section('conteudo_view')

    @include('caixa._cabecalho_caixa')

    @error('venda_id')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Info: </strong> {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    @error('pagamentos')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Info: </strong> {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    @error('cliente_id')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Info: </strong> {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

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
                    <div class="col-sm-6">
                        <b>Venda: {{$venda->id}}</b>
                    </div>

                    <div class="col-sm-6 col-auto">
                        @if(count($venda->vendaItens) > 0)
                            <button type="button" class="btn btn-link float-right" data-toggle="modal" data-target="#form_desconto">
                                Desconto
                            </button>
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
