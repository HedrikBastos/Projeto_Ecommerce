document.addEventListener("DOMContentLoaded", function () {
  mensagemBoaVinda();
  limparCampos();
});
const menuResponsivo = document.querySelector("#menuResponsivo");
const menuIcon = document.querySelector("#menuIcon");

function mensagemBoaVinda() {
  var bemVindoMensagem = document.getElementById("bemvindo-mensagem");
  if (localStorage.getItem("bemVindoDefinido") === "true") {
    return;
  }
  bemVindoMensagem.classList.remove("hidden");
  bemVindoMensagem.classList.add("mensagem-bem-vinda");
  bemVindoMensagem.style.opacity = "1";
  setTimeout(function () {
    bemVindoMensagem.style.opacity = "0";
    localStorage.setItem("bemVindoDefinido", "true");
  }, 5000);
}

function dropdown() {
  menuResponsivo.classList.toggle("hidden");
  if (!menuResponsivo.classList.contains("hidden")) {
    menuIcon.setAttribute("name", "x");
  } else {
    menuIcon.setAttribute("name", "menu");
  }
}

function colorOverIcon(element) {
  const box = element.querySelector(".icon");
  box.setAttribute("color", "#2563eb");
}

function colorOutIcon(element) {
  const box = element.querySelector(".icon");
  box.setAttribute("color", "#717171");
}

function limparCampos() {

  var formulario = document.getElementById('formulario');
  formulario.reset();

  return false;
}

