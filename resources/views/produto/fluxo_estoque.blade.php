@extends('layouts.painel_produtos')

@section('titulo', 'Fluxo de Estoque')

@section('titulo_conteudo')
    <div id="telafluxoestoque" class="row">
        <h4>Fluxo de Estoque</h4>
    </div>
@endsection

@section('conteudo_modulo')
    <div class="row mt-3">
        <table class="table table-sm table-hover table-bordered">
            <tr class="bg-dark text-white">
                <th>Nome</th>
                <th class="text-center">Cod.</th>
                <th class="text-center">Estoque</th>
                <th class="text-center">Estoque %</th>
                <th class="text-center">Produção Dia</th>
                <th class="text-center">Produção Mês</th>
                <th class="text-center">Vendas Dia</th>
                <th class="text-center">Vendas Mês</th>

            </tr>
            @foreach($fluxo as $f)
                <tr title="" class="">
                    <td>{{$f['produto']->nome}}</td>
                    <td class="text-center">{{$f['produto']->id}}</td>
                    <td class="text-right">{{$f['produto']->estoque}}</td>
                    <td class="text-center">{{number_format($f['porcentagem'], 2, '.', '')}}%</td>
                    <td class="text-right">{{$f['producaodia']}}</td>
                    <td class="text-right">{{$f['producaomes']}}</td>
                    <td class="text-right">{{$f['vendasdia']}}</td>
                    <td class="text-right">{{$f['vendasmes']}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
