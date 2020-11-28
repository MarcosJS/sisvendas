<div class="border rounded mt-3 border-success">
    <h3>Pagamentos</h3>

    <table class="table table-sm table-hover table-success mb-0">
        <tr>
            <th>Valor R$</th>
            <th>Tipo</th>
            <th>Data</th>
            <th></th>
            <th></th>
        </tr>

        @if(count($pagamentos) > 0)
            @foreach($pagamentos as $pag)
                <tr>
                    <td>{{$pag->valor}}</td>
                    <td>{{$pag->tipo}}</td>
                    <td>{{date('d/m/yy', strtotime($pag->dtpagamento))}}</td>
                    <td class="text-center"><a class="badge-info badge" href="#">Acessar</a></td>
                    <td class="text-center"><a class="badge-danger badge" href="{{route('excluirpagamento', $pag->id)}}">Excluir</a></td>
                </tr>
            @endforeach
        @endif
    </table>
</div>

