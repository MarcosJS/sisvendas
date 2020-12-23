//O TRECHO DO CÓDIGO A PARTIR DAQUI É REFERENTE À ATUALIZAÇÃO DO DESCONTO, TOTAL E LÍQUIDO DA PAGINA E FORMULÁRIOS
//DEPAGAMENTO
let desconto = document.getElementById('desconto'),
    novoDesconto = document.getElementById('novodesconto'),
    totalProdutos = document.getElementById('totalprodutos'),
    totalLiq = document.getElementById('totalliq'),
    totalLiqFinal = document.getElementById('totalliqfinal'),
    camposValor = document.getElementsByClassName('valor_pagamento');

if (camposValor) {
    //Preenchedo os campos correspondente ao valor do pagamento com o valor da venda
    for (let item of camposValor) {
        item.value = totalLiqFinal.value;
    }
}

if(novoDesconto) {
    novoDesconto.addEventListener('keyup', atualizarTotalProdutos);
}

function atualizarTotalProdutos() {
    let newTotalProdutos = totalProdutos.innerText - novoDesconto.value;
    newTotalProdutos = newTotalProdutos.toFixed(2);

    if(newTotalProdutos !== undefined || !isNaN(newTotalProdutos)){
        totalLiq.innerText = newTotalProdutos;
        desconto.value = novoDesconto.value;
    } else {
        totalLiq.innerText = "";
    }
}

//O TRECHO DO CÓDIGO A PARTIR DAQUI É REFERENTE A LISTA DE CLIENTES
let clientePesq = document.getElementById("clientepesq"),
    tabelaClientes = document.getElementsByClassName("listaclientes");

if(clientePesq) {
    clientePesq.onkeyup = function (){filtrarLista()};
}

for(let linha of tabelaClientes) {
    linha.onmousemove = function() {
        this.style.cursor = 'pointer';
    };
    linha.onclick = function() {
        location.href='venda/vincularcliente/'+this.firstElementChild.innerHTML;
    }
}

function filtrarLista() {

    let filtro, table, tr, tds, i, conteudo1, conteudo2, conteudo3;
    filtro = clientePesq.value.toUpperCase();
    table = document.getElementById("tabelaclientes");
    tr = table.getElementsByTagName('tr');

    for (i = 1; i < tr.length; i++) {
        tds = tr[i].getElementsByTagName('td');
        if (tds) {
            conteudo1 = tds[0].textContent || tds[0].innerText;
            conteudo1 = conteudo1.toUpperCase().indexOf(filtro) > -1;
            conteudo2 = tds[1].textContent || tds[1].innerText;
            conteudo2 = conteudo2.toUpperCase().indexOf(filtro) > -1;
            conteudo3 = tds[2].textContent || tds[2].innerText;
            conteudo3 = conteudo3.toUpperCase().indexOf(filtro) > -1;

            if (conteudo1 || conteudo2 || conteudo3) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
