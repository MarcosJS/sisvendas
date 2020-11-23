//O TRECHO DO CÓDIGO A PARTIR DAQUI É REFERENTE À ATUALIZAÇÃO DOS CAMPOS RELACIONADOS AO SUPRIMENTO

let suprimento = document.getElementById('suprimento'),
    valorSuprimento = document.getElementById('valor_suprimento'),
    saldoCaixa = document.getElementById('saldo_caixa'),
    novoSaldoCaixa = document.getElementById('novo_saldo_caixa');

if(valorSuprimento) {
    valorSuprimento.addEventListener('keyup', atualizarNovoSaldoCaixa);
}

function atualizarNovoSaldoCaixa() {
    let valorNovoSaldoCaixa = Number(saldoCaixa.innerText) + Number(valorSuprimento.value);
    valorNovoSaldoCaixa = valorNovoSaldoCaixa.toFixed(2);

    if(valorNovoSaldoCaixa !== undefined){
        novoSaldoCaixa.innerText = valorNovoSaldoCaixa;
        suprimento.value = Number(valorSuprimento.value);
    } else {
        novoSaldoCaixa.innerText = "0.00";
        suprimento.value = 0.00;
    }
}
