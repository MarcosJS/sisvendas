//Preenchendo campos de acordo com o valor do select
var prodSelecionado = document.getElementById('nomeproduto');
var qtd = document.getElementById('qtd');
var precoFinal = document.getElementById('precofinal');
var subTotal = document.getElementById("subtotal");
var codProduto = document.getElementById('codproduto');

function atualizarValoresItens() {
    let newSubTotal = qtd.value * precoFinal.value;
    console.log('qtd: ', qtd.value, 'precofinal: ', precoFinal.value, 'newsubtotal: ', newSubTotal);
    console.log('é nan ',isNaN(newSubTotal));
    if(newSubTotal !== undefined || !isNaN(newSubTotal)){
        subTotal.value = newSubTotal;
    } else {
        subTotal.value = "";
    }
}

qtd.addEventListener('keyup', atualizarValoresItens);

precoFinal.addEventListener('keyup', atualizarValoresItens);

if(prodSelecionado != null) {
    prodSelecionado.addEventListener('change', function () {
        codProduto.value = prodSelecionado.value;

        if(prodSelecionado.value !== "") {
            precoFinal.value = document.getElementById(prodSelecionado.value).value;
            precoFinal.value = precoFinal.value.replace(/,/g, '.');
            qtd.value = 1;
            atualizarValoresItens();
        } else {
            precoFinal.value = prodSelecionado.value;
            qtd.value = "";
            subTotal.value = "";
        }
    });
}


