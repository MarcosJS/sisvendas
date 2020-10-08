<div id="formcheque" class="col-md-8 position-absolute w-50 p-1" hidden>

    <div class="row">
        <h3 class="col">Cheque</h3>
        <div class="col">
            <button id="btncancel" class="btn btn-outline-danger float-right">Cancelar</button>
        </div>
    </div>
    <form class="col-md-12" action="/pagamentos/registrarcheque" method="post">
        {{csrf_field()}}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="banco">Banco</label>
                <input type="text" class="form-control" id="banco" placeholder="Nome do Banco">
            </div>
            <div class="form-group col-md-3">
                <label for="agencia">Agência</label>
                <input type="text" class="form-control" id="agencia" placeholder="0000-0">
            </div>
            <div class="form-group col-md-3">
                <label for="contacorrente">Conta Corrente</label>
                <input type="text" class="form-control" id="contacorrente" placeholder="00000-0">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="numerocheque">Numero do Cheque</label>
                <input type="text" class="form-control" id="numerocheque" placeholder="000000" name="numerocheque">
            </div>
            <div class="form-group col-md-3">
                <label for="valor">Valor</label>
                <input type="text" class="form-control" id="valor" placeholder="0,00" name="valor">
            </div>
            <div class="form-group col-md-3">
                <label for="vencimento">Vencimento</label>
                <input type="date" class="form-control" id="vencimento">
            </div>
            <div class="form-group col-md-3">
                <label for="emissao">Emissão</label>
                <input type="date" class="form-control" id="emissao">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="tipopessoa">Tipo de Pessoa</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="pessoalfisica" name="pessoafisica" class="custom-control-input">
                    <label class="custom-control-label" for="pessoafisica">Física</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="pessoaljuridica" name="pessoajuridica" class="custom-control-input">
                    <label class="custom-control-label" for="pessoajuridica">Jurídica</label>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="cnpj-cpf">CNPJ/CPF</label>
                <input type="text" class="form-control" id="cnpj-cpf" placeholder="000.000.000-00">
            </div>
            <div class="form-group col-md-6">
                <label for="emitente">Emitente</label>
                <input type="text" class="form-control" id="emitente" placeholder="Nome do emitente do cheque">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="portador">Portador</label>
                <input type="text" class="form-control" id="portador" placeholder="Nome do portador do cheque">
            </div>
            <div class="form-group col-md-6">
                <label for="observacoes">Observações</label>
                <textarea class="form-control" name="observacoes" id="observacoes" rows="2"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btnform">Registrar</button>
    </form>
</div>
