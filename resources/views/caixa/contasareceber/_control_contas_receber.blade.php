<div class="row bg-white border rounded shadow-sm">

    <div class="col-sm-1">
        <h4>Vales</h4>
    </div>

    <form class="col" action="{{route('filtrarcontasareceber')}}" method="post">
        @csrf
        <div class="container">
            <div class="row">
                <input type="text" class="form-control-sm text-primary mr-sm-2" placeholder="Cod. Vale" aria-label="Pesquisar por..." name="vale">

                <input type="text" id="venda" class="form-control-sm mr-sm-2" name="cliente" placeholder="Cod. Cliente" aria-label="Pesquisar por...">

                <div class="form-inline">
                    <label class="mr-sm-2" for="dt_inicio">Início</label>
                    <input type="date" class="form-control-sm mr-sm-2" id="dt_inicio" name="lanc_inicio">
                </div>

                <div class="form-inline">
                    <label class="mr-sm-2" for="dt_fim">Fim</label>
                    <input type="date" class="form-control-sm mr-sm-2" id="dt_fim" name="lanc_fim">
                </div>

                <div class="form-inline">
                    <label class="mr-sm-2" for="dt_inicio">Venc. Início</label>
                    <input type="date" class="form-control-sm mr-sm-2" id="dt_inicio" name="venc_inicio">
                </div>

                <div class="form-inline">
                    <label class="mr-sm-2" for="dt_fim">Venc. Fim</label>
                    <input type="date" class="form-control-sm mr-sm-2" id="dt_fim" name="venc_fim">
                </div>

                <div class="form-inline">
                    <label class="mr-sm-2" for="dt_inicio">Quit. Início</label>
                    <input type="date" class="form-control-sm mr-sm-2" id="dt_inicio" name="quit_inicio">
                </div>

                <div class="form-inline">
                    <label class="mr-sm-2" for="dt_fim">Quit. Fim</label>
                    <input type="date" class="form-control-sm mr-sm-2" id="dt_fim" name="quit_fim">
                </div>
                <button type="submit" class="btn-sm btnform">Filtrar</button>
            </div>

        </div>

    </form>

</div>
