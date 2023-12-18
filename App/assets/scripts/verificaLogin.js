document.addEventListener("DOMContentLoaded", function () {
  console.log(localStorage.getItem("bemVindoDefinido"));
  localStorage.clear();
  localStorage.setItem("mensagemDefinida", "false");
});

//modal

const modal = document.querySelector("#popup-modal");

function fecharModal() {
  modal.classList.toggle("flex");
  modal.classList.toggle("hidden");

}
