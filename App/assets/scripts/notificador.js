document.addEventListener("DOMContentLoaded", function () {
    notifica();
});
function notifica() {
    var Mensagem = document.getElementById('mensagem');
  
    if (localStorage.getItem('mensagemDefinida') === 'true') {
      return;
    }
  
    Mensagem.classList.remove('hidden');
  
    Mensagem.classList.add('mostraMensagem');
  
    setTimeout(function () {
      Mensagem.style.opacity = '1';
    }, 100);
  
    setTimeout(function () {
      Mensagem.style.opacity = '0';
      localStorage.setItem('mensagemDefinida', 'true');
    }, 5000);
  }
  
  