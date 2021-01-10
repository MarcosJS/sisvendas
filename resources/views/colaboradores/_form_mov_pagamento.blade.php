<form action="{{route('lancarmovimentopagamento', $colaborador->id)}}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-sm-6">
            <label for="categoria">Categoria</label>
            <select class="form-control" id="categoria" name="categoria">
                <option selected value="">Opção...</option>
                @foreach($catMovSalario as $cat)
                <option value="{{$cat->id}}">{{$cat->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-6">
            <label for="valor">Valor</label>
            <input type="text" class="form-control" id="valor" name="valor" value="{{$colaborador->salario}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col">
            <label for="observacao">Observação</label>
            <textarea class="form-control @error('observacao') is-invalid @enderror" id="observacao" rows="3" name="observacao">{{old('observacao')}}</textarea>
            @error('observacao')
            <span>
                <small class="text-danger">{{$message}}</small>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btnform">Lançar</button>
        </div>
    </div>
</form>
<?php
