@error('erro')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Erro: </strong>{{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror