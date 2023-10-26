document.addEventListener("DOMContentLoaded", function () {

  mensagemBoaVinda();

  const senhaInput = document.getElementById("senha");
  const confirmaSenhaInput = document.getElementById("confirmaSenha");
  const mensagemErro = document.getElementById("mensagemErro");

  senhaInput.addEventListener("input", verificarSenhas);
  confirmaSenhaInput.addEventListener("input", verificarSenhas);

  function verificarSenhas() {
    if (senhaInput.value !== confirmaSenhaInput.value) {
      mensagemErro.textContent = "As senhas não coincidem.";
    } else {
      mensagemErro.textContent = "";
    }
  }

  document.getElementById("cpf").addEventListener("input", function () {
    this.value = this.value.replace(/\D/g, '');
  });

});

const btnProximo = document.getElementById('btnProximo');
const registroUsuario = document.getElementById('registro-usuario');
const registroEndereco = document.getElementById('registro-endereco');

btnProximo.addEventListener('click', function () {

  registroUsuario.classList.remove('active');
  registroEndereco.classList.add('active');
});

function mensagemBoaVinda() {
  var bemVindoMensagem = document.getElementById('bemvindo-mensagem');

  if (localStorage.getItem('bemVindoDefinido') === 'true') {
    return;
  }

  bemVindoMensagem.classList.remove('hidden');

  setTimeout(function () {
    bemVindoMensagem.classList.add('hidden');
    localStorage.setItem('bemVindoDefinido', 'true');
  }, 5000);
}

 



