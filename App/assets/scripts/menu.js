document.addEventListener("DOMContentLoaded", function () {
  mensagemBoaVinda();
});
function mensagemBoaVinda() {
  var bemVindoMensagem = document.getElementById('bemvindo-mensagem');

  if (localStorage.getItem('bemVindoDefinido') === 'true') {
    return;
  }

  bemVindoMensagem.classList.remove('hidden');

  bemVindoMensagem.classList.add('mensagem-bem-vinda');

  setTimeout(function () {
    bemVindoMensagem.style.opacity = '1';
  }, 100);

  setTimeout(function () {
    bemVindoMensagem.style.opacity = '0';
    localStorage.setItem('bemVindoDefinido', 'true');
  }, 5000);
}


const menuResponsivo = document.querySelector("#menuResponsivo");
const menuIcon = document.querySelector("#menuIcon");

function dropdown() {
  menuResponsivo.classList.toggle("hidden");

  if (!menuResponsivo.classList.contains("hidden")) {
    menuIcon.setAttribute("name", "x"); 
  } else {
    menuIcon.setAttribute("name", "menu");
  }
}
