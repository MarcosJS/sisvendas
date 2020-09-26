<div class="row">
    <div class="col border">
        @if(count($clientes) > 0)
            <h2>Clientes>>Telefone</h2>
            <ul>
                @foreach($clientes as $cliente)
                    <li>{{$cliente->nome}}</li>
                    <ul>
                        @foreach($cliente->telefones as $tel)
                            <li>{{$tel->numerotel}}</li>
                        @endforeach
                    </ul>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="col border">
        @if(count($telefones) > 0)
            <h2>Telefone>>Cliente</h2>
            <ul>
                @foreach($telefones as $telefone)
                    <li>{{$telefone->numerotel}}</li>
                    <ul>
                        <li>{{$telefone->cliente->nome}}</li>
                    </ul>
                @endforeach
            </ul>
        @endif
    </div>
</div>

<!--#################################################################################################-->
<div class="row">
    <div class="col border">
        @if(count($clientes) > 0)
            <h2>Clientes>>Endereco</h2>
            <ul>
                @foreach($clientes as $cliente)
                    <li>{{$cliente->nome}}</li>
                    <ul>
                        <li>{{$cliente->endereco->logradouro}}</li>
                    </ul>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="col border">
        @if(count($enderecos) > 0)
            <h2>Endereco>>Cliente</h2>
            <ul>
                @foreach($enderecos as $endereco)
                    <li>{{$endereco->logradouro}}</li>
                    <ul>
                        <li>{{$endereco->cliente->nome}}</li>
                    </ul>
                @endforeach
            </ul>
        @endif
    </div>
</div>
