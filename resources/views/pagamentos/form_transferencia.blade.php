<div class="modal fade" id="formtransferencia" tabindex="-1" role="dialog" aria-labelledby="formtransferenciaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Transferência</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="col-md-12" action="{{route('registrartransferencia')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="border border-success rounded p-1">
                        <h5 class="text-secondary">Origem</h5>
                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                <label for="banco_origem">Banco</label>
                                <input type="text" class="form-control @error('banco_origem') is-invalid @enderror" id="banco_origem" name="banco_origem" value="{{old('banco_origem')}}" placeholder="Nome do Banco">
                                @error('banco_origem')
                                <span>
                                    <small class="text-danger">{{$message}}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="agencia_origem">Agência</label>
                                <input type="text" class="form-control @error('agencia_origem') is-invalid @enderror" id="agencia_origem" value="{{old('agencia_origem')}}" name="agencia_origem" placeholder="0000-0">
                                @error('agencia_origem')
                                <span>
                                    <small class="text-danger">{{$message}}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-3">
                            <label for="conta_origem">Conta</label>
                            <input type="text" class="form-control @error('conta_origem') is-invalid @enderror" id="conta_origem" value="{{old('conta_origem')}}" placeholder="00000-0" name="conta_origem">
                            @error('conta_origem')
                            <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                            @enderror
                        </div>
                            <div class="form-group col-sm-2">
                                <label for="operacao_origem">Operação</label>
                                <input type="text" class="form-control @error('operacao_origem') is-invalid @enderror" id="operacao_origem" value="{{old('operacao_origem')}}" placeholder="000" name="operacao_origem">
                                @error('operacao_origem')
                                <span>
                                <small class="text-danger">{{$message}}</small>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="border border-success rounded p-1  mt-1">
                        <h5 class="text-secondary">Destino</h5>
                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                <label for="banco_destino">Banco</label>
                                <input type="text" class="form-control @error('banco_destino') is-invalid @enderror" id="banco_destino" name="banco_destino" value="{{old('banco_destino')}}" placeholder="Nome do Banco">
                                @error('banco_destino')
                                <span>
                                    <small class="text-danger">{{$message}}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="agencia_destino">Agência</label>
                                <input type="text" class="form-control @error('agencia_destino') is-invalid @enderror" id="agencia_destino" value="{{old('agencia_destino')}}" name="agencia_destino" placeholder="0000-0">
                                @error('agencia_destino')
                                <span>
                                    <small class="text-danger">{{$message}}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="conta_destino">Conta</label>
                                <input type="text" class="form-control @error('conta_destino') is-invalid @enderror" id="conta_destino" value="{{old('conta_destino')}}" placeholder="00000-0" name="conta_destino">
                                @error('conta_destino')
                                <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="operacao_destino">Operação</label>
                                <input type="text" class="form-control @error('operacao_destino') is-invalid @enderror" id="operacao_destino" value="{{old('operacao_destino')}}" placeholder="000" name="operacao_destino">
                                @error('operacao_destino')
                                <span>
                                <small class="text-danger">{{$message}}</small>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="border border-success rounded p-1  mt-1">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="valor_cheque">Valor</label>
                                <input type="text" class="form-control @error('valor') is-invalid @enderror" id="valor_cheque" placeholder="0,00" name="valor" value="{{old('valor')}}">
                                @error('valor')
                                <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dttransferencia">Data</label>
                                <input type="date" class="form-control @error('dttransferencia') is-invalid @enderror" id="dttransferencia" name="dttransferencia" value="{{old('dttransferencia')}}">
                                @error('dttransferencia')
                                <span>
                                    <small class="text-danger">{{$message}}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="numcomprovante">Nº Comprovante</label>
                                <input type="text" class="form-control @error('numcomprovante') is-invalid @enderror" id="numcomprovante" name="numcomprovante" value="{{old('numcomprovante')}}">
                                @error('numcomprovante')
                                <span>
                                    <small class="text-danger">{{$message}}</small>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label for="observacao">Observação</label>
                                <textarea class="form-control @error('observacao') is-invalid @enderror" name="observacao" id="observacao" rows="2"></textarea>
                            </div>
                            @error('observacao')
                            <span>
                            <small class="text-danger">{{$message}}</small>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <input class="valor_pagamento" type="hidden" name="valorcompra">
                    <input type="hidden" value="1" name="pagamento">
                    @if($vale != null)
                        <input id="vale" type="hidden" value="{{$vale->id}}" name="vale">
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btnform">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

