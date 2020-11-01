<div id="listaclientes" class="col-md-8 position-absolute w-50 p-1" hidden>
    <div class="row">
        <div class="col">
            <button id="closelistclientes" type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <input id="clientepesq" class="form-control" type="text" placeholder="buscar">
    <table id="tabelaclientes" class="table table-sm table-hover">
        <tr>
            <th>Cod.</th>
            <th>Nome</th>
            <th>CPF</th>
        </tr>
        @foreach($clientes as $cliente)
            <tr class="listaclientes">
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->cpf}}</td>
            </tr>
        @endforeach
    </table>
    <div class="row">
        <form class="col" action="{{route('novocliente')}}" method="get">
            <button type="submit" class="btn btnform">Novo</button>
        </form>
        <div class="col">
            <button id="removercliente" type="submit" class="btn btn-outline-secondary float-right">Desvincular Cliente</button>
        </div>

    </div>

</div>
