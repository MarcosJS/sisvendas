<form action="{{route('adicionaritem')}}" method="post">
    {{csrf_field()}}
    <div class="form-row">
        <div class="form-group col-sm-7">
            <label for="nomeproduto">Produto</label>
            <select id="nomeproduto" class="form-control @error('codproduto') is-invalid @enderror" name="nomeproduto" autofocus>
                <option selected value="" {{ (old("codproduto") == "" ? "selected":"") }}>Produtos...</option>
                @foreach($produtos as $produto)
                    <option value="{{$produto->id}}" {{ (old("codproduto") == $produto->id ? "selected":"") }}>{{$produto->nome}}</option>
                @endforeach
            </select>
            @error('codproduto')
            <span>
                <small class="text-danger">{{$message}}</small>
            </span>
            @enderror
        <!-- Esses dados são apenas para preencher os campos id e preco através de javascrip -->
            @foreach($produtos as $produto)
                <input id="{{$produto->id}}" type="hidden" value="{{$produto->preco}}">
                <input id="estoque{{$produto->id}}" type="hidden" value="{{$produto->estoque}}">
            @endforeach
        </div>

        <div class="form-group col-sm-2">
            <label for="codproduto">Cod.</label>
            <input id="codproduto" type="text" class="form-control @error('codproduto') is-invalid @enderror" name="codproduto" value="{{old('codproduto')}}" readonly>
            @error('codproduto')
            <span>
                            <small class="text-danger">{{$message}}</small>
                        </span>
            @enderror
        </div>

        <div class="form-group col-sm-3">
            <label for="estoqueproduto">Estoque</label>
            <input id="estoqueproduto" type="text" class="form-control @error('estoqueproduto') is-invalid @enderror" name="estoqueproduto" value="{{old('estoqueproduto')}}" readonly>
            @error('estoqueproduto')
            <span>
                            <small class="text-danger">{{$message}}</small>
                        </span>
            @enderror
        </div>
    </div>

    <div class="form-row">

        <div class="form-group col">
            <label for="qtd">Quantidade</label>
            <input id="qtd" type="text" class="form-control @error('qtd') is-invalid @enderror" name="qtd" value="{{old('qtd')}}">
            @error('qtd')
            <span>
                            <small class="text-danger">{{$message}}</small>
                        </span>
            @enderror
        </div>

        <div class="form-group col">
            <label for="precofinal">Preço Final</label>
            <input id="precofinal" type="text" class="form-control @error('precofinal') is-invalid @enderror" name="precofinal" value="{{old('precofinal')}}">
            @error('precofinal')
            <span>
                            <small class="text-danger">{{$message}}</small>
                        </span>
            @enderror
        </div>

        <div class="form-group col">
            <label for="subtotal">Subtotal</label>
            <input id="subtotal" type="text" class="form-control @error('subtotal') is-invalid @enderror" name="subtotal" value="{{old('precofinal')}}" readonly>
            @error('subtotal')
            <span>
                            <small class="text-danger">{{$message}}</small>
                        </span>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btnform">Adicionar</button>

</form>
