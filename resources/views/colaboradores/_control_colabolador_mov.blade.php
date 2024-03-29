<div class="row bg-white border rounded shadow-sm">
    <div class="col">

        <div class="row mt-1">
            <div class="col-sm-3">
                <h4>Movimentos de Salario</h4>
            </div>

            <div class="col-sm-9">
                <div class="row">
                    <form class="form-inline" action="{{route('filtrarmovimentossalario')}}" method="get">

                        <input type="text" class="form-control-sm text-primary mr-sm-2" name="colaborador" @if($colaborador != null) value="{{$colaborador->id}}" @endif placeholder="Cod. Colaborador" aria-label="colaborador" aria-describedby="basic-addon2">

                        <select class="form-control-sm mr-sm-2" name="competencia" id="competencia" aria-label="competencia">
                            <option value="">Competência</option>
                            @foreach($competencias as $competencia)
                                <option value="{{$competencia->id}}" @if($pesquisa['competencia'] == $competencia->id) selected @endif>
                                    {{substr(str_repeat(0, 2).$competencia->numero, - 2)}}/{{$competencia->exercicio}}
                                </option>
                            @endforeach
                        </select>

                        <select class="form-control-sm mr-sm-2" name="tipo" id="tipo" aria-label="tipo">
                            <option value="">Tipo de Movimento</option>
                            @foreach($tipos as $tipo)
                                <option value="{{$tipo->id}}" @if($pesquisa['tipo'] == $tipo->id) selected @endif>
                                    {{$tipo->nome}}
                                </option>
                            @endforeach
                        </select>

                        <select class="form-control-sm mr-sm-2" name="categoria" id="categoria" aria-label="categoria">
                            <option value="">Categoria de Movimento</option>
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}" @if($pesquisa['categoria'] == $categoria->id) selected @endif>
                                    {{$categoria->nome}}
                                </option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn-sm btnform">Filtrar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>
