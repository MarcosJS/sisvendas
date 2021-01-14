//O TRECHO DO CÓDIGO A PARTIR DAQUI É REFERENTE À ATUALIZAÇÃO DOS CAMPOS RELACIONADOS AO PAGAMENTO EM DINHEIRO

let dinheiro = document.getElementById('dinheiro'),
    valorDinheiro = document.getElementById('valor_dinheiro'),
    aReceber = document.getElementById('areceber'),
    recebido = document.getElementById('recebido'),
    troco = document.getElementById('troco'),
    novoValorAReceberVenda = document.getElementById('novo_valor_receber_venda');

if(valorDinheiro) {
    valorDinheiro.addEventListener('keyup', atualizarAReceber);
}

if(recebido) {
    recebido.addEventListener('keyup', atualizarTroco);
}

function atualizarAReceber() {
    let novoValorAReceber = Number(aReceber.value) - Number(valorDinheiro.value);
    novoValorAReceber = novoValorAReceber.toFixed(2);

    if(novoValorAReceber !== undefined){
        novoValorAReceberVenda.innerText = novoValorAReceber;
        dinheiro.value = Number(valorDinheiro.value);
    } else {
        novoValorAReceberVenda.innerText = "0.00";
        dinheiro.value = 0.00;
    }
}

function atualizarTroco() {
    let novoTroco = Number(recebido.value) - Number(valorDinheiro.value);
    novoTroco = novoTroco.toFixed(2);

    if(novoTroco !== undefined){
        troco.innerText = novoTroco;
    } else {
        troco.innerText = "0.00";
    }
}
