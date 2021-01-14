<div class="row mt-3">
    <nav class="col nav nav-pills nav-justified pr-0">
        @if(!$caixa->aberto())
            <a class="ml-1 mb-1 pt-3 pb-3 nav-item nav-link btnformout shadow" href="{{route('abrircaixa')}}">
                <b>Abrir Caixa</b>
            </a>
        @endif
        <button type="button" class="ml-1 mb-1 pt-3 pb-3 nav-item nav-link btnformout shadow" data-toggle="modal" data-target="#formcheque">
            <b>CHEQUE</b>
        </button>
        <button class="ml-1 mb-1 pt-3 pb-3 nav-item nav-link btnformout shadow" data-toggle="modal" data-target="#formdinheiro">
            <b>DINHEIRO</b>
        </button>
        <button class="ml-1 mb-1 pt-3 pb-3 nav-item nav-link btnformout shadow" data-toggle="modal" data-target="#formtransferencia">
           <b>TRANSFERENCIA</b>
        </button>
            @if($vale == null)
                <button class="ml-1 mb-1 pt-3 pb-3 nav-item nav-link btnformout shadow" data-toggle="modal" data-target="#formvale">
                    <b>VALE</b>
                </button>
                <a class="ml-1 mb-1 pt-3 pb-3 nav-item nav-link btnformout shadow" href="{{route('caixa')}}">
                    <b>Itens</b>
                </a>
                <a class="ml-1 mb-1 pt-3 pb-3 nav-item nav-link btnformout shadow" href="{{route('registrarvenda')}}">
                    <b>Finalizar</b>
                </a>
                <a class="ml-1 mb-1 pt-3 pb-3 mr-1 nav-item nav-link btn-outline-danger shadow" href="{{route('cancelar')}}">
                    <b>Cancelar Venda</b>
                </a>
            @else
                <a class="ml-1 mb-1 pt-3 pb-3 nav-item nav-link btnformout shadow" href="{{route('quitarvale', $vale)}}">
                    <b>Quitar</b>
                </a>
                <a class="ml-1 mb-1 pt-3 pb-3 mr-1 nav-item nav-link btn-outline-danger shadow" href="{{route('cancelarquitacao', $vale)}}">
                    <b>Cancelar Quitação</b>
                </a>
            @endif


    </nav>
</div>
