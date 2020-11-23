<div class="modal fade" id="listaclientes" tabindex="-1" role="dialog" aria-labelledby="listaclientesLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="listaclientesLabel">Clientes</h5>
                <button id="closelistclientes" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{route('incluirnomecliente')}}" method="post">
                    @csrf()
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('nomecliente') is-invalid @enderror" placeholder="Acrescentar apenas um nome" aria-label="Recipient's username" aria-describedby="basic-addon2" name="nomecliente">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Salvar</button>
                        </div>
                    </div>
                    @error('nomecliente')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </form>

                <div class="input-group mb-3">
                    <input type="text" id="clientepesq" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">Buscar</span>
                    </div>
                </div>

                <table id="tabelaclientes" class="table table-sm table-hover mt-2">
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

            </div>

            <div class="modal-footer">
                <a class="btn btnform" href="{{route('novocliente')}}" role="button">Cadastrar Novo</a>
            </div>
        </div>
    </div>
</div>

