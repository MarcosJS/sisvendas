//O TRECHO DO CÓDIGO A PARTIR DAQUI É REFERENTE À ATUALIZAÇÃO DOS CAMPOS RELACIONADOS AO SUPRIMENTO

let sangria = document.getElementById('sangria'),
    valorSangria = document.getElementById('valor_sangria'),
    saldoCaixaSa = document.getElementById('saldo_caixa_sa'),
    novoSaldoCaixaSa = document.getElementById('novo_saldo_caixa_sa');

if(valorSangria) {
    valorSangria.addEventListener('keyup', atualizarNovoSaldoCaixa);
}

function atualizarNovoSaldoCaixa() {
    let valorNovoSaldoCaixa = Number(saldoCaixaSa.innerText) - Number(valorSangria.value);
    valorNovoSaldoCaixa = valorNovoSaldoCaixa.toFixed(2);

    if(valorNovoSaldoCaixa !== undefined){
        novoSaldoCaixaSa.innerText = valorNovoSaldoCaixa;
        sangria.value = Number(valorSangria.value);
    } else {
        novoSaldoCaixaSa.innerText = "0.00";
        sangria.value = 0.00;
    }
}
