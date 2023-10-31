$.ajax({
  url: "http://localhost/Ecommerce/json",
  type: "POST",
  data: { acao: "obterCarrinho" }, // Solicita o carrinho do PHP
  dataType: "json",
})
  .done(function (data) {
    var total = document.createElement("p");
    var totalDiv = document.querySelector(".totalDiv");
    var totalFinal = 0;

    for (var produtoID in data) {
      console.log(data);

      var carrinhoContainer = document.querySelector(".carrinho");
      var produto = data[produtoID];

      var id_produto = produto.id_produto;

      console.log(id_produto);

      var produtoDiv = document.createElement("div");
      var formAdicionar = document.createElement("form");
      var formSubtrair = document.createElement("form");
      var inpAdicionar = document.createElement("input");
      var inpSubtrair = document.createElement("input");
      var inpIdSubtrair = document.createElement("input");
      var inpIdAdicionar = document.createElement("input");
      var btnAdicionar = document.createElement("input");
      var btnSubtrair = document.createElement("input");

      var totalProduto = produto.quantidade * produto.preco;
      totalFinal += totalProduto;

      produtoDiv.innerHTML = `
      <span class=" font-bold " >Nome:</span> ${produto.nome}
      <span class=" font-bold ml-[10px]" >Quantidade:</span> ${produto.quantidade}
      <span class=" font-bold ml-[10px]" >Preço:</span> ${produto.preco.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}
    `;

      inpAdicionar.setAttribute("value", "adicionar");
      inpAdicionar.setAttribute("type", "hidden");
      inpAdicionar.setAttribute("name", "acao");
      inpSubtrair.setAttribute("type", "hidden");
      inpSubtrair.setAttribute("value", "subtrair");
      inpSubtrair.setAttribute("name", "acao");
      inpIdSubtrair.setAttribute("type", "hidden");
      inpIdSubtrair.setAttribute("name", "produtoID");
      inpIdSubtrair.value = id_produto;
      inpIdAdicionar.setAttribute("type", "hidden");
      inpIdAdicionar.setAttribute("name", "produtoID");
      inpIdAdicionar.value = id_produto;
      btnAdicionar.setAttribute("type", "submit");
      btnSubtrair.setAttribute("type", "submit");
      btnAdicionar.setAttribute("value", "+");
      btnSubtrair.setAttribute("value", "-");

      btnAdicionar.addEventListener("click", () => {
        location.reload();
      });

      btnSubtrair.addEventListener("click", () => {
        location.reload();
      });

      carrinhoContainer.classList.add("sm:text-lg")
      produtoDiv.classList.add("produtoDiv");
      produtoDiv.classList.add("flex");
      produtoDiv.classList.add("gap-3");
      formAdicionar.classList.add("form-adicionar");
      formSubtrair.classList.add("form-subtrair");
      inpAdicionar.classList.add("btnAdicionar");
      inpSubtrair.classList.add("btnSubtrair");
      inpIdSubtrair.classList.add("produtoID");
      inpIdAdicionar.classList.add("produtoID");
     
      btnAdicionar.classList.add("px-2");
      btnAdicionar.classList.add("border-[3px]");
      btnAdicionar.classList.add("rounded-[20%]");
      btnAdicionar.classList.add("border-blue-500");
      btnAdicionar.classList.add("font-semibold");
      btnAdicionar.classList.add("text-lg");
      btnAdicionar.classList.add("hover:bg-blue-500");
      btnAdicionar.classList.add("text-center");
      btnAdicionar.classList.add("cursor-pointer");

      btnSubtrair.classList.add("px-2");
      btnSubtrair.classList.add("border-[3px]");
      btnSubtrair.classList.add("rounded-[20%]");
      btnSubtrair.classList.add("border-red-500");
      btnSubtrair.classList.add("font-semibold");
      btnSubtrair.classList.add("text-lg");
      btnSubtrair.classList.add("hover:bg-red-500");
      btnSubtrair.classList.add("text-center");
      btnSubtrair.classList.add("cursor-pointer");

      btnAdicionar.textContent = "+";
      btnSubtrair.textContent = "-";

      carrinhoContainer.appendChild(produtoDiv);

      produtoDiv.appendChild(formAdicionar);
      formAdicionar.appendChild(inpAdicionar);
      formAdicionar.appendChild(inpIdAdicionar);
      formAdicionar.appendChild(btnAdicionar);

      produtoDiv.appendChild(formSubtrair);
      formSubtrair.appendChild(inpIdSubtrair);
      formSubtrair.appendChild(inpSubtrair);
      formSubtrair.appendChild(btnSubtrair);
    }

    total.innerHTML = `<span class="font-bold text-2xl ">Total a pagar: </span> R$ ${totalFinal.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;

    totalDiv.appendChild(total);
  })
  .fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Erro na requisição: " + errorThrown);
  });
