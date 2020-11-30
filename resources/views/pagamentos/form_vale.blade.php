<div class="modal fade" id="formvale" tabindex="-3" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="exampleModalLabel">Lançamento de Vale</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-white" aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('registrarvale')}}" method="post">
                {{csrf_field()}}

                <div class="modal-body">
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-sm-9">
                                <table>
                                    <tr>
                                        <td class="text-right"><b>Total da Venda R$:</b></td>
                                        <td class="text-right">{{number_format($venda->totalliq,2, '.', '')}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><b>A Receber R$:</b></td>
                                        <td class="text-right">{{number_format($venda->aReceber(),2, '.', '')}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><label for="vale"><b>Valor do vale R$:</b></label></td>
                                        <td class="text-right"><input id="vale" class="form-control text-right p-0" value="0.00" type="text" name="vale"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><label for="dtvencimento"><b>Vencimento:</b></label></td>
                                        <td class="text-right"><input id="dtvencimento" class="form-control text-right p-0" value="{{date('Y-m-d', strtotime('+30 days'))}}" type="date" name="dtvencimento"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer bg-success">
                    <button type="submit" class="btn btn-success"><b>Registrar</b></button>
                </div>

            </form>
        </div>
    </div>
</div>


