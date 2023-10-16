document.addEventListener("DOMContentLoaded", function() {
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

    document.getElementById("cpf").addEventListener("input", function() {
      this.value = this.value.replace(/\D/g, '');
  });

  });
 