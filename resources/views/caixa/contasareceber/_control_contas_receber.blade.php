<div class="row bg-white border rounded shadow-sm">
    <div class="col">

        <div class="row mt-1">
            <div class="col-sm-1">
                <h4>Vales</h4>
            </div>

            <div class="col-sm-2">
                <input type="text" class="form-control-sm text-primary" placeholder="Pesquisar por..." aria-label="Pesquisar por..." aria-describedby="basic-addon2">
            </div>

            <div class="col-sm-7">
                <div class="row">
                    <form class="form-inline" action="{{route('filtrarcontasareceber')}}" method="post">
                        @csrf
                        <label class="mr-sm-2" for="venda">Venda</label>
                        <input type="text" id="venda" class="form-control-sm" name="venda">

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
        </div>
    </div>

</div>
