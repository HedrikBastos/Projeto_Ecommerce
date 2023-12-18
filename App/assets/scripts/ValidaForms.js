document.addEventListener("DOMContentLoaded", function () {
  verificarCamposPreenchidos();
  document.getElementById("cpf").addEventListener("input", function () {
    this.value = this.value.replace(/\D/g, '');
  });

  document.getElementById("telefone").addEventListener("input", function () {
    this.value = this.value.replace(/\D/g, '');
  });

  document.getElementById("nome").addEventListener("input", function () {
    this.value = this.value.replace(/\d/g, "");
  });
  document.getElementById("sobrenome").addEventListener("input", function () {
    this.value = this.value.replace(/\d/g, "");
  });
  document.getElementById("contraSenha").addEventListener("input", function () {
    this.value = this.value.replace(/\d/g, "");
  });
});

const btnAcao = document.getElementById("btnAcao");
const inputsObrigatorios = document.querySelectorAll(".campo-obrigatorio");
const registroUsuario = document.getElementById('registro-usuario');
const registroEndereco = document.getElementById('registro-endereco');
const senhaInput = document.getElementById("senha");
const confirmaSenhaInput = document.getElementById("confirmaSenha");
const mensagemErroSenhas = document.getElementById("mensagemErroSenhas");
const mensagemErroEmail = document.getElementById("mensagemErroEmail");
const inputCPF = document.getElementById("cpf");
const mensagemErroCPF = document.getElementById("mensagemErroCPF");

btnAcao.addEventListener('click', function () {
  registroUsuario.classList.remove('active');
  registroEndereco.classList.add('active');
});



function verificarCamposPreenchidos() {
  const todosPreenchidos = Array.from(inputsObrigatorios).every(input => input.value.trim() !== "");
  const senhasComMinLength = senhaInput.value.length >= parseInt(senhaInput.getAttribute("minlength")) &&
    confirmaSenhaInput.value.length >= parseInt(confirmaSenhaInput.getAttribute("minlength"));
  verificarSenhas();
  verificarEmail();
  verificarCPF();
  if (todosPreenchidos && senhasComMinLength) {
    btnAcao.style.display = "block";
  } else {
    btnAcao.style.display = "none";
  }
}

document.addEventListener("DOMContentLoaded", function () {
  inputsObrigatorios.forEach(input => {
    input.addEventListener("input", verificarCamposPreenchidos);
  });
});

function verificarSenhas() {
  if (senhaInput.value !== confirmaSenhaInput.value) {
    mensagemErroSenhas.textContent = "As senhas não coincidem.";
    mensagemErroSenhas.classList.remove("sucesso");
    mensagemErroSenhas.classList.add("erro");
  } else if (senhaInput.value.length > 1 && senhaInput.value.length < 4) {
    mensagemErroSenhas.textContent = "A senha deve conter no mínimo 4 caracteres.";
    mensagemErroSenhas.classList.remove("erro");
    mensagemErroSenhas.classList.add("sucesso");
  } else {
    mensagemErroSenhas.textContent = "Preencha todos os campos";
    mensagemErroSenhas.classList.remove("sucesso");
    mensagemErroSenhas.classList.remove("erro");
  }
}

function verificarEmail() {
  const emailInput = document.querySelector('input[name="email"]');
  const email = emailInput.value;
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailRegex.test(email) && email !== "") {
    mensagemErroEmail.textContent = 'O email inserido não é válido.';
    mensagemErroEmail.classList.remove('sucesso');
    mensagemErroEmail.classList.add('erro');
  } else {
    mensagemErroEmail.textContent = '';
    mensagemErroEmail.classList.remove('sucesso');
    mensagemErroEmail.classList.remove('erro');
  }
}

function verificarCPF() {
  if (inputCPF.value.length === '') {
    mensagemErroCPF.textContent = '';
    mensagemErroCPF.classList.remove('sucesso');
    mensagemErroCPF.classList.remove('erro');
  }

  else if (inputCPF.value.length > 1 && inputCPF.value.length < 11) {
    mensagemErroCPF.textContent = 'O CPF deve conter 11 digitos.';
    mensagemErroCPF.classList.remove('sucesso');
    mensagemErroCPF.classList.add('erro');
  } else {
    mensagemErroCPF.textContent = '';
    mensagemErroCPF.classList.remove('sucesso');
    mensagemErroCPF.classList.remove('erro');
  }
}