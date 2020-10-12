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
            <tr>
                <td>{{$pag->valor}}</td>
                <td>{{$pag->tipo}}</td>
                <td>{{date('d/m/yy', strtotime($pag->dtpagamento))}}</td>
                <td class="text-center"><a class="badge-info badge" href="#">Acessar</a></td>
            </tr>
        @endforeach
    </table>
</div>
