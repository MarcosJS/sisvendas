document.getElementById("menu-toggle").addEventListener('click', function(e) {
    e.preventDefault();
    btn = document.getElementById("wrapper");
    console.log(btn);
    btn.classList.toggle("toggled");
    console.log(btn);
});
