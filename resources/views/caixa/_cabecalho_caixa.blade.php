@error('abrir')
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Info: </strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror
@error('fechar')
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Info: </strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror

<div class="row rounded bg-success shadow-sm">
    <div class="col" style="color: darkgreen">
        <div>
            <b>Caixa: </b>@if($caixa->aberto()) <b class="text-white">{{$turno->statusTurno->nome}}</b> @else <b class="text-secondary">FECHADO</b>@endif
        </div>
        <div>
            <b>Turno:  </b><b class="text-white">{{$caixa->turnoAtual}}</b>
        </div>
    </div>

    <div class="col-auto" style="color: darkgreen">
        <div>
            <b>Início:  </b>@if($caixa->aberto())<b class="text-white">{{date('d/m/Y h:i:s', strtotime($turno->abertura))}}@endif</b>
        </div>
        <div>
            <b>Operador:  </b><b class="text-white">{{auth()->user()->nome}}</b>
        </div>
    </div>
</div>
