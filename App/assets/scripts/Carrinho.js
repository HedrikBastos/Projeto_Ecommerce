$(document).on("submit", ".form-adicionar", function (e) {
    e.preventDefault();
  
    var adicionar = $(this).find(".btnAdicionar").val();
    var produtoID = $(this).find(".produtoID").val();
  
    $.ajax({
      url: "http://localhost/html/Projeto_Ecommerce/carrinho",
      method: "POST",
      data: { acao: adicionar, produtoID: produtoID },
      dataType: "json",
    }).done(function (result) {
      console.log(result);
    });
  });
  
  $(document).on("submit", ".form-subtrair", function (e) {
    e.preventDefault();
  
    var subtrair = $(this).find(".btnSubtrair").val();
    var produtoID = $(this).find(".produtoID").val();
  
    $.ajax({
      url: "http://localhost/html/Projeto_Ecommerce/carrinho",
      method: "POST",
      data: { acao: subtrair, produtoID: produtoID },
      dataType: "json",
    }).done(function (result) {
      console.log(result);
    });
  });

  function up() {
    setTimeout(function() {
      location.reload();
    }, 150);
  }
  