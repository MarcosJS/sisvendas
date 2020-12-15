<div class="row bg-white border rounded shadow-sm">
    <div class="col">

        <div class="row mt-1">
            <div class="col-sm align-self-center">
                <form class="form-inline" action="{{route('filtrarcontroledecaixa')}}" method="post">
                    @csrf
                    <label class="mr-sm-2" for="tipo">Tipo</label>
                    <select class="custom-select-sm mr-sm-2" id="tipo" name="tipo">
                        <option selected value="">TODOS</option>
                        <option value="1">ENTRADA</option>
                        <option value="2">SAIDA</option>
                    </select>

                    <label class="mr-sm-2" for="categoria">Categoria</label>
                    <select class="custom-select-sm mr-sm-2" id="categoria" name="categoria">
                        <option selected value="">TODOS</option>
                        <option value="1">SUPRIMENTO</option>
                        <option value="2">SANGRIA</option>
                        <option value="3">RECEBIMENTO</option>
                        <option value="4">ESTORNO</option>
                        <option value="5">DEVOLUCAO</option>
                    </select>

                    <label class="mr-sm-2" for="meio">Meio</label>
                    <select class="custom-select-sm mr-sm-2" id="meio" name="meio">
                        <option selected value="">TODOS</option>
                        <option value="DINHEIRO">DINHEIRO</option>
                        <option value="CHEQUE">CHEQUE</option>
                        <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                    </select>

                    <label class="mr-sm-2" for="turno">Turno</label>
                    <input type="text" id="turno" class="form-control-sm" name="turno" value="@if($turno != null){{$turno->id}}@endif">

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
                <input type="text" class="form-control-sm text-primary" placeholder="Pesquisar por..." aria-label="Pesquisar por..." aria-describedby="basic-addon2">
            </div>
        </div>
    </div>

</div>
