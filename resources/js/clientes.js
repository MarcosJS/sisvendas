var tabelaUsuarios = document.getElementsByClassName("linhatabelausuarios");
for(let linha in tabelaUsuarios) {
    tabelaUsuarios[linha].onmousemove = function() {
        this.style.cursor = 'pointer';
    };
    tabelaUsuarios[linha].onclick = function() {
        location.href='/usuarios/perfil/'+this.firstElementChild.innerHTML;
    }
}

btncadusuario = document.getElementById('btncadasusuario');
if(btncadusuario) {
    btncadusuario.addEventListener('click', function () {
        location.href='/usuarios/novo';
    });
}

btneditusuario = document.getElementById('btneditusuario');
if(btneditusuario) {
    btneditusuario.addEventListener('click', function () {
        location.href = '/usuarios/editar/' + document.getElementById('id').innerText;
    });
}
