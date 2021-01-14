@error('venda_id')
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Info: </strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror

@error('observacao')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Erro no Suprimento/Sangria: </strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror

@error('pagamentos')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Info: </strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror

@error('pagamentos_maior')
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Info: </strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <hr>
    <p>Revise o pagamento ou transforme o excedente de <b class="text-success">R$ {{$excedente}}</b> em crédito para o cliente.</p>

    @if($venda->cliente != null)
        <form action="{{route('gerarcredito')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" value="{{$venda->id}}" name="venda">
            <input type="hidden" value="{{$excedente}}" name="excedente">
            <button type="submit" class="btn-sm btn-success">
                <b>Gerar Crédito e Finalizar</b>
            </button>
        </form>
    @else
        <p class="text-danger">Obs.: Não há nenhum cliente cadastrado vinculado a esta venda!</p>
    @endif
</div>
@enderror

@error('cliente_id')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Info: </strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror

@error('erro')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Info: </strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror
