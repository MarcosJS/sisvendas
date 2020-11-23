@if(count($venda->vendaItens) > 0)
    @error('vinculocliente')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Atenção!</strong> {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @if($venda->cliente != null)
        <div>
            <b>Cliente: {{$venda->cliente->nome}}</b>
            <b>CPF: {{$venda->cliente->cpf}}</b>
            <a class="btn btn-link" href="{{route('desvincularcliente')}}" role="button">Desvincular</a>
        </div>
    @elseif($venda->nomecliente != null)
        <div>
            <b>Cliente: {{$venda->nomecliente}}</b>
        </div>
        <a class="btn btn-link" href="{{route('desvincularcliente')}}" role="button">Desvincular cliente</a>
    @else
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Atenção!</strong> Considere vincular um cliente
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#listaclientes">
            Vincular cliente
        </button>
        <div>
            <b>Nenhum cliente vinculado a venda</b>
        </div>

        @include('clientes.lista_clientes')
    @endif
@endif
