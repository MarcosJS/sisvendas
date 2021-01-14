<div class="row bg-white border rounded shadow-sm">
    <div class="col">

        <div class="row mt-1">
            <div class="col-sm align-self-center">
                <form class="form-inline" action="{{route('filtrarcontroledecaixa')}}" method="post">
                    @csrf
                    <input type="text" class="form-control-sm text-primary mr-sm-2 col-sm-1" name="movimento" placeholder="Cod. Movimento" aria-label="Pesquisar por..." aria-describedby="basic-addon2">

                    <label class="mr-sm-2" for="turno">Turno</label>
                    <input type="text" id="turno" class="form-control-sm  col-sm-1" name="turno" value="@if($turno != null){{$turno->id}}@endif">

                    <select class="custom-select custom-select-sm mr-sm-2" id="tipo" name="tipo" aria-label="tipo">
                        <option selected value="">TIPO</option>
                        @foreach($tipoMovimento as $tipoMov)
                            <option value="{{$tipoMov->id}}">{{$tipoMov->nome}}</option>
                        @endforeach
                    </select>

                    <select class="custom-select custom-select-sm mr-sm-2" id="categoria" name="categoria" aria-label="categoria">
                        <option selected value="">CATEGORIA</option>
                        @foreach($catMovimento as $catMov)
                            <option value="{{$catMov->id}}">{{$catMov->nome}}</option>
                        @endforeach
                    </select>

                    <select class="custom-select custom-select-sm mr-sm-2" id="meio" name="meio" aria-label="meio">
                        <option selected value="">MEIO</option>
                        @foreach($tipoPagamento as $tipoPag)
                            <option value="{{$tipoPag->id}}">{{$tipoPag->nome}}</option>
                        @endforeach
                    </select>

                    <label for="dt_inicio">Início</label>
                    <input type="date" class="form-control-sm mr-sm-2" id="dt_inicio" name="dt_inicio">

                    <label for="dt_fim">Fim</label>
                    <div class="input-group mr-sm-2">
                        <input type="date" class="form-control-sm" id="dt_fim" name="dt_fim">
                    </div>

                    <button type="submit" class="btn-sm btnform">Filtrar</button>
                </form>
            </div>
        </div>

        <div class="row mt-1">
            <div class="col-sm-2">
                <h4>Movimentos</h4>
            </div>
            <div class="col">

            </div>
        </div>
    </div>

</div>
