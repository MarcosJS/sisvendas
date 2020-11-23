<div class="modal fade" id="modal_sangria" tabindex="-3" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="exampleModalLabel">Sangria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-white" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-sm-12">
                            <table>
                                <tr>
                                    <td class="text-right"><b>Saldo atual do Caixa R$:</b></td>
                                    <td id="saldo_caixa_sa" class="text-right">{{number_format($caixa->obterSaldo(),2, '.', '')}}</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><label for="valor_sangria"><b>Valor R$:</b></label></td>
                                    <td class="text-right"><input id="valor_sangria" class="form-control text-right p-0" value="0.00" type="text" name="valor_sangria"></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><b>SALDO APÓS A SANGRIA R$:</b></td>
                                    <td id="novo_saldo_caixa_sa" class="text-right text-success"><b>{{number_format($caixa->obtersaldo(),2, '.', '')}}</b></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer bg-success">
                <form action="{{route('realizar_sangria')}}" method="post">
                    {{csrf_field()}}
                    <input id="sangria" type="hidden" value="0.00" name="sangria">

                    <button type="submit" class="btn btn-success"><b>Realizar sangria</b></button>

                </form>
            </div>
        </div>
    </div>
</div>

