document.addEventListener("DOMContentLoaded", function () {
  verificarCamposPreenchidos();
  mensagemBoaVinda();

  document.getElementById("cpf").addEventListener("input", function () {
    this.value = this.value.replace(/\D/g, '');
  });

});

const btnProximo = document.getElementById("btnProximo");
const inputsObrigatorios = document.querySelectorAll(".campo-obrigatorio");
const registroUsuario = document.getElementById('registro-usuario');
const registroEndereco = document.getElementById('registro-endereco');
const senhaInput = document.getElementById("senha");
const confirmaSenhaInput = document.getElementById("confirmaSenha");

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


function verificarCamposPreenchidos() {
  verificarSenhas();
  const todosPreenchidos = Array.from(inputsObrigatorios).every(input => input.value.trim() !== "");
  const senhasComMinLength = senhaInput.value.length >= parseInt(senhaInput.getAttribute("minlength")) &&
                           confirmaSenhaInput.value.length >= parseInt(confirmaSenhaInput.getAttribute("minlength"));

  if (todosPreenchidos && senhasComMinLength) {
    btnProximo.style.display = "block";
  } else {
    btnProximo.style.display = "none";
  }
}


document.addEventListener("DOMContentLoaded", function () {
  inputsObrigatorios.forEach(input => {
    input.addEventListener("input", verificarCamposPreenchidos);
  });
});

function verificarSenhas() {
  const senhaInput = document.getElementById("senha");
  const confirmaSenhaInput = document.getElementById("confirmaSenha");
  const mensagemErro = document.getElementById("mensagemErro");

  if (senhaInput.value !== confirmaSenhaInput.value) {
    mensagemErro.textContent = "As senhas não coincidem.";
    mensagemErro.classList.remove("bg-blue-200");
    mensagemErro.classList.add("bg-red-200");
  } else if (senhaInput.value.length < 4) {
    mensagemErro.textContent = "A senha deve conter no mínimo 4 caracteres.";
    mensagemErro.classList.remove("bg-red-200"); 
    mensagemErro.classList.add("bg-blue-200"); 
  } else {
    mensagemErro.textContent = "";
    mensagemErro.classList.remove("bg-blue-200"); 
    mensagemErro.classList.remove("bg-red-200"); 
  }
}


