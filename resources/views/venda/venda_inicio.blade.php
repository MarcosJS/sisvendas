@extends('layouts.painel_venda')

@section('titulo', 'SISVendas PDV - Início')

@section('titulo_conteudo')
    <div id="iniciovendas" class="row">
        <h4>SISVendas PDV</h4>
    </div>
@endsection

@section('conteudo_view')
    <div class="row mt-3">
        @if(count($vendasPendentes) > 0)
            <div class="col alert alert-warning" role="alert">
                <h4 class="alert-heading"><strong>Atenção</strong></h4>
                <p>As sequintes vendas estão em aberto:</p>
                <table class="table table-hover table-sm">
                    <tr>
                        <th>Cod.</th>
                        <th>Data</th>
                        <th>Total</th>
                    </tr>

                    @foreach($vendasPendentes as $v)
                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->dtvenda}}</td>
                            <td>{{$v->totalliq}}</td>
                            <td><a class="alert-link" href="{{route('acessarvenda', ['id'=> $v->id])}}">Acessar</a></td>
                        </tr>
                    @endforeach
                </table>

            </div>
        @endif
    </div>
@endsection
