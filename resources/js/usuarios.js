tabelaUsuarios = document.getElementsByClassName("linhatabelausuarios");
for(linha in tabelaUsuarios) {
    tabelaUsuarios[linha].onmousemove = function() {
        this.style.cursor = 'pointer';
    };
    tabelaUsuarios[linha].onclick = function() {
        location.href='/usuarios/perfil/'+this.firstElementChild.innerHTML;
    }
}


