<div class="modal fade" id="form_suprimento" tabindex="-3" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="exampleModalLabel">Suprimento</h5>
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
                                    <td id="saldo_caixa" class="text-right">{{number_format($caixa->obterSaldo(),2, '.', '')}}</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><label for="valor_suprimento"><b>Valor R$:</b></label></td>
                                    <td class="text-right"><input id="valor_suprimento" class="form-control text-right p-0" value="0.00" type="text" name="valor_suprimento"></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><b>SALDO APÓS O SUPRIMENTO R$:</b></td>
                                    <td id="novo_saldo_caixa" class="text-right text-success"><b>{{number_format($caixa->obtersaldo(),2, '.', '')}}</b></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <form action="{{route('adicionar_suprimento')}}" method="post">
                {{csrf_field()}}
                <div class="form-group col">
                    <label for="observacao">Observação:</label>
                    <textarea class="form-control @error('observacao') is-invalid @enderror" name="observacao" id="observacao" rows="2">{{old('observacao')}}</textarea>
                </div>
                <div class="modal-footer bg-success">
                    <input id="suprimento" type="hidden" value="0.00" name="suprimento">

                    <button type="submit" class="btn btn-success"><b>Adicionar suprimento</b></button>
                </div>
            </form>
        </div>
    </div>
</div>

