<div class="modal fade" id="form_desconto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="exampleModalLabel">Desconto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-white" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-sm-10">
                        <table>
                            <tr>
                                <td class="text-right"><b>Total R$:</b></td>
                                <td id="totalprodutos" class="text-right">{{$venda->totalprodutos}}</td>
                            </tr>
                            <tr>
                                <td class="text-right"><label for="novodesconto"><b>Desconto %:</b></label></td>
                                <td class="text-right"><input id="novodesconto" class="form-control text-right p-0" type="text" value="{{number_format($venda->descPorcent(),2, '.', '')}}" name="novodesconto"></td>
                            </tr>
                            <tr>
                                <td class="text-right"><b>TOTAL COM DESCONTO R$:</b></td>
                                <td id="totalliq" class="text-right"><b>{{$venda->totalliq}}</b></td>
                            </tr>
                            <input id="totalliqfinal" type="hidden" value="{{$venda->totalliq}}">
                        </table>
                    </div>
                </div>

            </div>
            <div class="modal-footer bg-success">
                <form action="{{route('aplicardesconto')}}" method="post">
                    {{csrf_field()}}
                    <input id="desconto" type="hidden" value="{{$venda->descPorcent()}}" name="desconto">

                    <button type="submit" class="btn btn-success"><b>Aplicar Desconto</b></button>

                </form>
            </div>
        </div>
    </div>
</div>
