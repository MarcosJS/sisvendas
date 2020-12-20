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
