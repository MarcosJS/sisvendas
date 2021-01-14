@extends('layouts.painel_caixa')

@section('titulo', 'SISVendas PDV - Caixa')

@section('conteudo_view')

    @include('caixa._cabecalho_caixa')

    @include('caixa._errors')

    <div class="row mt-3">
        <div class="col-sm-6 pb-1">

            @if($cliente != null)
                <div>
                    <b>Cliente: {{$cliente->nome}}</b>
                    <b>CPF: {{$cliente->cpf}}</b>
                </div>
            @endif

            @include('pagamentos._pagamentos_venda')
        </div>

        <div class="col border rounded">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-5">
                        <b>Vale: {{$vale->id}}</b>
                    </div>
                </div>
            </div>

            <table class="table table-sm table-striped">
                <tr>
                    <th>Cod.</th>
                    <th>Cliente</th>
                    <th>Lançamento</th>
                    <th class="text-right">Valor</th>
                    <th class="text-center">Vencimento</th>
                </tr>
                <tr>
                    <td>{{$vale->id}}</td>
                    <td>{{$cliente->nome}}</td>
                    <td>{{$vale->dtlancamento}}</td>
                    <td>{{$vale->valor}}</td>
                    <td>{{$vale->dtvencimento}}</td>
                </tr>
            </table>
            <input id="areceber" type="hidden" value="{{$vale->valor}}">
        </div>
    </div>

    @include('pagamentos.form_cheque')
    @include('pagamentos.form_transferencia')
    @include('pagamentos.form_dinheiro')
@endsection

@section('rodape')
    <div class="container">
        @include('caixa._info_vale')

        @include('caixa._pagamento_menu')
    </div>
@endsection
