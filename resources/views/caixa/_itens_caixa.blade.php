<table class="table table-sm table-striped">
    <tr>
        <th>Cod.</th>
        <th>Nome do Produto</th>
        <th>Quant</th>
        <th>Preco Final</th>
        <th>Subtotal</th>
        <th></th>
    </tr>

    @if(count($venda->vendaItens) > 0)
        @foreach($venda->vendaItens as $item)
            <tr>
                <td>{{$item->produto->id}}</td>
                <td>{{$item->produto->nome}}</td>
                <td>{{$item->qtd}}</td>
                <td>{{$item->precofinal}}</td>
                <td>{{$item->subtotal}}</td>
                <td class="text-center"><a class="badge-danger badge" href="{{route('excluiritem', $item->id)}}">Remover</a></td>
            </tr>
        @endforeach
    @endif
</table>
