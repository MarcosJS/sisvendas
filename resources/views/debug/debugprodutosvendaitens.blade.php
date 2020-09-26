<div class="row">
    <div class="col border">
        @if(count($produtos) > 0)
            <h2>Produtos>>VendaItens</h2>
            <ul>
                @foreach($produtos as $produto)
                    <li>{{$produto->id}} {{$produto->nome}}</li>
                    <ul>
                        @foreach($produto->vendaItens as $vi)
                            <li>{{$vi->id}}</li>
                        @endforeach
                    </ul>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="col border">
        @if(count($vendaItens) > 0)
            <h2>VendaItens>>Produtos</h2>
            <ul>
                @foreach($vendaItens as $vi)
                    <li>{{$vi->id}}</li>
                    <ul>
                        <li>{{$vi->produto->nome}}</li>
                    </ul>
                @endforeach
            </ul>
        @endif
    </div>
</div>

