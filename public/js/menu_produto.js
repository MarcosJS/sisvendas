var telaprodutos = document.getElementById('telaprodutos'),
    telanovoproduto = document.getElementById('telanovoproduto'),
    telafluxoestoque = document.getElementById('telafluxoestoque');

if (telaprodutos) {
    btn = document.getElementById('btnprodutos');
    btn.classList.add('btnformout-active');
}

if (telanovoproduto) {
    var btn = document.getElementById('btnnovoproduto');
    btn.classList.add('btnformout-active');
}

if (telafluxoestoque) {
    btn = document.getElementById('btnfluxoestoque');
    btn.classList.add('btnformout-active');
}



