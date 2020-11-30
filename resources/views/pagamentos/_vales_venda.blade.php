<div class="border rounded mt-3 border-primary">
    <h3>Vales</h3>

    <table class="table table-sm table-hover table-primary mb-0">
        <tr>
            <th>Valor R$</th>
            <th>Lançamento</th>
            <th>Vencimento</th>
            <th>Status</th>
            <th></th>
            <th></th>
        </tr>

        @if(count($vales) > 0)
            @foreach($vales as $vale)
                <tr>
                    <td>{{$vale->valor}}</td>
                    <td>{{date('d/m/yy', strtotime($vale->dtlacamento))}}</td>
                    <td>{{date('d/m/yy', strtotime($vale->dtvecimento))}}</td>
                    <td>@if($vale->pagamento != null) QUITADO @else AGUARDANDO PARAMENTO @endif</td>
                    <td class="text-center"><a class="badge-info badge" href="#">Acessar</a></td>
                    <td class="text-center"><a class="badge-danger badge" href="{{route('excluirvale', $vale->id)}}">Excluir</a></td>
                </tr>
            @endforeach
        @endif
    </table>
</div>
