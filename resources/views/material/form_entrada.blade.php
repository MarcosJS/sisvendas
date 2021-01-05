<form action="{{route('registrarentrada', $material->id)}}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-sm-6">
            <label for="quantidade">Quantidade</label>
            <input type="text" class="form-control" id="quantidade" placeholder="0" name="quantidade" value="0">
        </div>

        <div class="form-group col-sm-6">
            <label for="data">Data</label>
            <input type="date" class="form-control" id="data" name="dtmovimento">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-sm-12">
            <label for="observacao">Observação</label>
            <textarea class="form-control" id="observacao" rows="3" name="observacao"></textarea>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btnform">Registrar</button>
        </div>
    </div>
</form>
