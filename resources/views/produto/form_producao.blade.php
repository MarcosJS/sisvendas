<form action="{{route('registrarproducao', $produto->id)}}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-sm-4">
            <label for="categoria">Orígem</label>
            <select class="form-control" id="categoria" name="categoria">
                <option selected value="">Origem...</option>
                <option value="1">PRODUÇÃO</option>
                <option value="2">SIMPLES ENTRADA NO ESTOQUE</option>
            </select>
        </div>
        <div class="form-group col-sm-4">
            <label for="quantidade">Quantidade</label>
            <input type="text" class="form-control" id="quantidade" placeholder="0" name="quantidade">
        </div>

        <div class="form-group col-sm-4">
            <label for="data">Data</label>
            <input type="date" class="form-control" id="data" name="dtmovimento">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btnform">Registrar</button>
        </div>
    </div>
</form>
