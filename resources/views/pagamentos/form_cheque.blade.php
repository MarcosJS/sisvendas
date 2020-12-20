<div class="modal fade" id="formcheque" tabindex="-1" role="dialog" aria-labelledby="formchequeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Cheque</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="col-md-12" action="{{route('registrarcheque')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="banco">Banco</label>
                            <input type="text" class="form-control @error('banco') is-invalid @enderror" id="banco" name="banco" value="{{old('banco')}}" placeholder="Nome do Banco">
                            @error('banco')
                            <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="agencia">Agência</label>
                            <input type="text" class="form-control @error('agencia') is-invalid @enderror" id="agencia" value="{{old('agencia')}}" name="agencia" placeholder="0000-0">
                            @error('agencia')
                            <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                            @enderror
                        </div>
                        <!--<div class="form-group col-md-3">
                            <label for="contacorrente">Conta Corrente</label>
                            <input type="text" class="form-control @error('contacorrente') is-invalid @enderror" id="contacorrente" placeholder="00000-0" name="contacorrente" value="{{old('contacorrente')}}">
                            @error('contacorrente')
                            <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                            @enderror
                        </div>-->
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="numerocheque">Numero do Cheque</label>
                            <input type="text" class="form-control @error('numero') is-invalid @enderror" id="numerocheque" placeholder="000000" name="numero" value="{{old('numero')}}">
                            @error('numero')
                            <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="valor_cheque">Valor</label>
                            <input type="text" class="form-control @error('valor') is-invalid @enderror" id="valor_cheque" placeholder="0,00" name="valor" value="{{old('valor')}}">
                            @error('valor')
                            <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="vencimento">Vencimento</label>
                            <input type="date" class="form-control @error('vencimento') is-invalid @enderror" id="vencimento" name="vencimento" value="{{old('vencimento')}}">
                            @error('vencimento')
                            <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="emissao">Emissão</label>
                            <input type="date" class="form-control @error('emissao') is-invalid @enderror" id="emissao" name="emissao" value="{{old('emissao')}}">
                            @error('emissao')
                            <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3 @error('tipo') is-invalid @enderror">
                            <div class="row">
                                <label for="tipopessoa">Tipo de Pessoa</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="form-check-input radio" type="radio" id="pessoafisica" name="tipo" value="PESSOA FISICA" {{ (old("tipo") == 'PESSOA FISICA' ? "checked":"") }}>
                                <label class="form-check-label" for="pessoafisica">Física</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input  class="form-check-input radio" type="radio" id="pessoajuridica" name="tipo" value="PESSOA JURIDICA" {{ (old("tipo") == 'PESSOA JURIDICA' ? "checked":"") }}>
                                <label class="form-check-label" for="pessoajuridica">Jurídica</label>
                            </div>
                            @error('tipo')
                            <div class="row">
                                <span>
                                    <small class="text-danger">{{$message}}</small>
                                </span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inscricao">CNPJ/CPF</label>
                            <input type="text" class="form-control @error('inscricao') is-invalid @enderror" id="inscricao" placeholder="000.000.000-00" name="inscricao" value="{{old('inscricao')}}">
                            @error('inscricao')
                            <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emitente">Emitente</label>
                            <input type="text" class="form-control @error('nome') is-invalid @enderror" id="emitente" placeholder="Nome do emitente do cheque" name="nome" value="{{old('nome')}}">
                            @error('nome')
                            <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="portador">Portador</label>
                            <input type="text" class="form-control @error('portador') is-invalid @enderror" id="portador" placeholder="Nome do portador do cheque" name="portador" value="{{old('portador')}}">
                            @error('portador')
                            <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="observacoes">Observações</label>
                            <textarea class="form-control @error('observacao') is-invalid @enderror" name="observacao" id="observacoes" rows="2"></textarea>
                        </div>
                        @error('observacao')
                        <span>
                            <small class="text-danger">{{$message}}</small>
                        </span>
                        @enderror
                    </div>
                    <input class="valor_pagamento" type="hidden" name="valorcompra">
                    <input type="hidden" value="1" name="pagamento">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btnform">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
