<div class="card">
    <div class="card-body">
        @if($composicao != null)
            <h5 class="card-title">Composição N° {{$composicao->id}}</h5>

            <table class="table table-bordered table-hover table-sm">
                <thead>
                <tr>
                    <th >Cod. Material</th>
                    <th >Nome</th>
                    <th >Quant.</th>
                </tr>
                </thead>
                <tbody>
                @foreach($composicao->itensComposicao as $item)
                    <tr>
                        <td>{{$item->materiaPrima->id}}</td>
                        <td>{{$item->materiaPrima->nome}}</td>
                        <td>{{$item->quantidade}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h5 class="card-title">Não há composição cadastrada</h5>
        @endif

        <a href="{{route('novacomposicao', $produto->id)}}" class="btn btn-primary">Nova</a>
        <a href="{{route('editarcomposicao', $produto->id)}}" class="btn btn-primary">Editar</a>
    </div>
</div>
