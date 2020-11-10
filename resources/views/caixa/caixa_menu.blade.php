<div class="row mt-3">
    <nav class="col nav nav-pills nav-justified pr-0">
        @if(!$caixa->aberto())
        <a class="ml-1 mb-1 pt-3 pb-3 nav-item nav-link btnformout shadow" href="{{route('abrircaixa')}}">
            <b>Abrir Caixa</b>
        </a>
        @else
        <a class="ml-1 mb-1 pt-3 pb-3 nav-item nav-link btnformout shadow" href="{{route('fecharcaixa')}}">
            <b>Fechar Caixa</b>
        </a>
        @endif
        <a class="ml-1 mb-1 pt-3 pb-3 nav-item nav-link btnformout shadow" href="#">
            <b>Suprimento</b>
        </a>
        <a class="ml-1 mb-1 pt-3 pb-3 nav-item nav-link btnformout shadow" href="#">
            <b>Sangria</b>
        </a>
        <a class="ml-1 mb-1 pt-3 pb-3 nav-item nav-link btnformout shadow" href="{{route('registrarvenda')}}">
            <b>Finalizar</b>
        </a>
        <a class="ml-1 mb-1 pt-3 pb-3 mr-1 nav-item nav-link btn-outline-danger shadow" href="{{route('cancelar')}}">
            <b>Cancelar Venda</b>
        </a>
    </nav>
</div>
