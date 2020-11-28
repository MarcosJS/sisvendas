<div class="modal fade" id="formdinheiro" tabindex="-3" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="exampleModalLabel">Pagamento em Dinheiro</h5>
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
                                    <td class="text-right"><b>Total da Venda R$:</b></td>
                                    <td id="total_venda" class="text-right">{{number_format($venda->totalliq,2, '.', '')}}</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><b>A Receber R$:</b></td>
                                    <td id="novo_valor_receber_venda" class="text-right">{{number_format($venda->aReceber(),2, '.', '')}}</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><label for="valor_dinheiro"><b>Entre com o valor em dinheiro R$:</b></label></td>
                                    <td class="text-right"><input id="valor_dinheiro" class="form-control text-right p-0" value="0.00" type="text" name="valor_dinheiro"></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><label for="recebido"><b>Recebido R$:</b></label></td>
                                    <td class="text-right"><input id="recebido" class="form-control text-right p-0" value="0.00" type="text" name="recebido"></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><b>Troco R$:</b></td>
                                    <td id="troco" class="text-right text-success"><b>0.00</b></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer bg-success">
                <form action="{{route('registrardinheiro')}}" method="post">
                    {{csrf_field()}}
                    <input id="dinheiro" type="hidden" value="0.00" name="dinheiro">

                    <button type="submit" class="btn btn-success"><b>Registrar</b></button>

                </form>
            </div>
        </div>
    </div>
</div>


