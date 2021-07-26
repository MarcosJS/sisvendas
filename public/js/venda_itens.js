//Preenchendo campos de acordo com o valor do select
let prodSelecionado = document.getElementById('nomeproduto'),
    qtd = document.getElementById('qtd'),
    precoFinal = document.getElementById('precofinal'),
    subTotal = document.getElementById("subtotal"),
    codProduto = document.getElementById('codproduto'),
    estoqueProduto = document.getElementById('estoqueproduto');

//prodSelecionado.autofocus = true;

//console.log(prodSelecionado.autofocus)

function atualizarValoresItens() {
    let newSubTotal = qtd.value * precoFinal.value;
    newSubTotal = newSubTotal.toFixed(2);
    if(newSubTotal !== undefined || !isNaN(newSubTotal)){
        subTotal.value = newSubTotal;
    } else {
        subTotal.value = "";
    }
}

if(qtd) {
    qtd.addEventListener('keyup', atualizarValoresItens);
}

if(precoFinal) {
    precoFinal.addEventListener('keyup', atualizarValoresItens);
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


