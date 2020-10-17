//Preenchendo campos de acordo com o valor do select
var prodSelecionado = document.getElementById('nomeproduto');
var qtd = document.getElementById('qtd');
var precoFinal = document.getElementById('precofinal');
var subTotal = document.getElementById("subtotal");
var codProduto = document.getElementById('codproduto');
var estoqueProduto = document.getElementById('estoqueproduto');
var desconto = document.getElementById('desconto');
var novoDesconto = document.getElementById('novodesconto');
var totalProdutos = document.getElementById('totalprodutos');
var totalLiq = document.getElementById('totalliq');

function atualizarValoresItens() {
    let newSubTotal = qtd.value * precoFinal.value;
    newSubTotal = newSubTotal.toFixed(2);
    if(newSubTotal !== undefined || !isNaN(newSubTotal)){
        subTotal.value = newSubTotal;
    } else {
        subTotal.value = "";
    }
}

function atualizarTotalProdutos() {
    let newTotalProdutos = totalProdutos.innerText * (1 - (novoDesconto.value / 100));
    newTotalProdutos = newTotalProdutos.toFixed(2);

    if(newTotalProdutos !== undefined || !isNaN(newTotalProdutos)){
        totalLiq.innerText = newTotalProdutos;
        desconto.value = novoDesconto.value;
    } else {
        totalLiq.innerText = "";
    }
}

if(qtd) {
    qtd.addEventListener('keyup', atualizarValoresItens);
}

if(precoFinal) {
    precoFinal.addEventListener('keyup', atualizarValoresItens);
}

if(novoDesconto) {
    novoDesconto.addEventListener('keyup', atualizarTotalProdutos);
}

if(prodSelecionado != null) {
    prodSelecionado.addEventListener('change', function () {
        codProduto.value = prodSelecionado.value;

        if(prodSelecionado.value !== "") {
            estoqueProduto.value = document.getElementById('estoque'+prodSelecionado.value).value;
            precoFinal.value = document.getElementById(prodSelecionado.value).value;
            precoFinal.value = precoFinal.value.replace(/,/g, '.');
            qtd.value = 1;
            atualizarValoresItens();
        } else {
            estoqueProduto.value = "";
            precoFinal.value = prodSelecionado.value;
            qtd.value = "";
            subTotal.value = "";
        }
    });
}


