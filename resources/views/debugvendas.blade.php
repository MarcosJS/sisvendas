<div class="row">
    <div class="col border">
        @if(count($clientes) > 0)
            <h2>Cliente>>Vendas</h2>
            <ul>
                @foreach($clientes as $cliente)
                    <li>{{$cliente->id}} {{$cliente->nome}}</li>
                    <ul>
                        @foreach($cliente->vendas as $v)
                            <li>{{$v->id}}</li>
                        @endforeach
                    </ul>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="col border">
        @if(count($vendas) > 0)
            <h2>Vendas>>Clientes</h2>
            <ul>
                @foreach($vendas as $v)
                    <li>{{$v->id}}</li>
                    <ul>
                        <li>{{$v->cliente->nome}}</li>
                    </ul>
                @endforeach
            </ul>
        @endif
    </div>
</div>

<!--############################################################################################################-->
<div class="row">
    <div class="col border">
        @if(count($usuarios) > 0)
            <h2>Usuario>>Vendas</h2>
            <ul>
                @foreach($usuarios as $usuario)
                    <li>{{$usuario->id}} {{$usuario->nome}}</li>
                    <ul>
                        @foreach($usuario->vendas as $v)
                            <li>{{$v->id}}</li>
                        @endforeach
                    </ul>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="col border">
        @if(count($vendas) > 0)
            <h2>Vendas>>Usuarios</h2>
            <ul>
                @foreach($vendas as $v)
                    <li>{{$v->id}}</li>
                    <ul>
                        <li>{{$v->usuario->nome}}</li>
                    </ul>
                @endforeach
            </ul>
        @endif
    </div>
</div>

<!--############################################################################################################-->
<div class="row">
    <div class="col border">
        @if(count($vendas) > 0)
            <h2>Vendas>>VendaItens</h2>
            <ul>
                @foreach($vendas as $venda)
                    <li>{{$venda->id}} {{$venda->dtvenda}}</li>
                    <ul>
                        @foreach($venda->vendaItens as $v)
                            <li>{{$v->id}}</li>
                        @endforeach
                    </ul>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="col border">
        @if(count($vendaItens) > 0)
            <h2>VendaItens>>Vendas</h2>
            <ul>
                @foreach($vendaItens as $vi)
                    <li>{{$vi->id}}</li>
                    <ul>
                        <li>{{$vi->venda->id}}</li>
                    </ul>
                @endforeach
            </ul>
        @endif
    </div>
</div>
