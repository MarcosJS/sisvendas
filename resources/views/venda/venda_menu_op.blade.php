<div class="row mt-3">
    <nav class="col nav nav-pills nav-justified pr-0">
        <a id="btnitens" class="nav-item nav-link btnformout" href="{{route('itens')}}">Itens</a>
        <a id="btnpagamento" class="nav-item nav-link btnformout" href="{{route('pagamento')}}">Pagamento</a>
        <a id="btnvalidacao" class="nav-item nav-link btnformout" href="{{route('validarpagamento')}}">Validação</a>
        <a id="btnfinalizar" class="nav-item nav-link btnformout disabled" href="{{route('registrarvenda')}}" disabled>Finalizar</a>
        <a class="nav-item nav-link btn-outline-danger" href="{{route('cancelar')}}">Cancelar</a>
    </nav>
    @if($venda != null)
        <input id="validadevenda" type="hidden" value="{{$venda->valida}}">
    @endif
</div>

