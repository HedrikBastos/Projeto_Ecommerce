var searchInput = document.querySelector("#searchInput");
var autocomplete = document.querySelector("#autocomplete");

searchInput.addEventListener("focusout", (event) => {
  autocomplete.style.display = "none";
});

searchInput.addEventListener("focusin", (event) => {
  autocomplete.style.display = "block";
  if (autocomplete.textContent.length == 0 || event.target.value == 0) {
    autocomplete.innerHTML = "Nada aqui";
  }
});

function select(element) { 
searchInput.value = element.textContent
}

searchInput.addEventListener(
  "input",
  _.throttle(async (event) => {
    try {
      if (event.target.value.length >= 3) {
        const { data } = await axios.get("jsonestoque", {
          params: {
            produto: event.target.value,
          },
        });
        console.log(data);

        if (data.length == 0) {
          autocomplete.style.display = "block";
          autocomplete.innerHTML =
            '<div id="notfound">Não foi encontrado nenhum produto</div>';
          return;
        }

        autocomplete.style.display = "block";
        var produtoFound = "<ul>";
        produtoFound += data.map((produto) => {return `<li><a  style="cursor: pointer;" id="tituloProdutos" >${produto.nome}</a></li>`;}).join("");

        produtoFound += "</ul>";

        autocomplete.innerHTML = produtoFound;

        const tituloProdutos = document.querySelectorAll("#tituloProdutos");

        tituloProdutos.forEach((element) => {
          element.addEventListener("mousein", () => {
            element.addEventListener("click", select(element));
          });

          element.addEventListener("mouseout", () => {
            element.removeEventListener("click", select(element));
          });
        });
      }
    } catch (error) {
      console.log(error);
    }
  }),
  500
);

