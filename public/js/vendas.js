var tabelaVendas = document.getElementsByClassName("linhatabelavendas");
for(let linha in tabelaVendas) {
    tabelaVendas[linha].onmousemove = function() {
        this.style.cursor = 'pointer';
    };
    tabelaVendas[linha].onclick = function() {
        location.href='/venda/acessar/'+this.firstElementChild.innerHTML;
    }
}
