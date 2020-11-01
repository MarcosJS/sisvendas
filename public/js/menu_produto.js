var painelprodutos = document.getElementById('painelprodutos'),
    telaprodutos = document.getElementById('telaprodutos'),
    telanovoproduto = document.getElementById('telanovoproduto'),
    telafluxoestoque = document.getElementById('telafluxoestoque');

if (painelprodutos) {
    menuProdutos= document.getElementById('menu_produtos');
    subMenuProdutos = document.getElementById('sub_menu_produtos');
    menuProdutos.classList.add('collapsed');
    subMenuProdutos.classList.add('show');
}

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



