//O TRECHO DO CÓDIGO A PARTIR DAQUI É REFERENTE À ATUALIZAÇÃO DOS CAMPOS RELACIONADOS AO PAGAMENTO EM CHEQUE
let valorCheque = document.getElementById('valor_cheque');

if (valorCheque) {
   valorCheque.value = document.getElementById('areceber_venda').value;
}
