@extends('layouts.painel_caixa')

@section('titulo', 'SISVendas PDV - Caixa')

@section('conteudo_view')

    @include('caixa._cabecalho_caixa')

    @include('caixa._errors')

    <div class="row mt-3">
        <div class="col-sm-6 pb-1">
            @include('caixa._caixa_vinculo_cliente')

            @include('caixa._form_item_caixa')
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
        </div>
    </div>

    @include('caixa._modal_desconto_caixa')
    @include('caixa._modal_suprimento')
    @include('caixa._modal_sangria')
@endsection

@section('rodape')
    <div class="container">
        @include('caixa._info_itens_caixa')

        @include('caixa.caixa_menu')
    </div>
@endsection

