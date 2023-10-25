var searchInput = document.querySelector("#searchInput");
var autocomplete = document.querySelector("#autocomplete");

searchInput.addEventListener('focusin', event =>{
    autocomplete.style.display = "block";
    if ( autocomplete.textContent.length == 0 || event.target.value == 0) {
        autocomplete.innerHTML = 'Nada aqui'; 
    }
})

searchInput.addEventListener('focusout', event =>{
    autocomplete.style.display = "none";
})


searchInput.addEventListener("input", _.throttle(async (event) => {
    try {
      if (event.target.value.length >= 3) {

        const { data } = await axios.get("books.php", {
          params: {
            book: event.target.value,
          },
        });

        console.log(data)

        if (data.length == 0) {
          autocomplete.style.display = "block";
          autocomplete.innerHTML = '<div id="notfound">Não foi encontrado nenhum produto</div>';
          return;
        }


        //Provavelmente vou ter que criar uma função em cada linha de nome de produto abaixo,um onclick por exemplo para que quando o usuário clicque adicione ao valor do input do produto.
        

        autocomplete.style.display = "block";
        var booksFound = '<ul>';
        booksFound+= data.map(book =>{
            return `
            <li><a onclick="select($this)" href="/book/${book.id}" >${book.title}</a></li>
            `
        }).join('');

        booksFound+='</ul>';
        autocomplete.innerHTML = booksFound;

       function select(element){
        searchInput.innerHTML = element.innerHTML
        autocomplete.style.display = "none";
      }
        
      }
    } catch (error) {
      console.log(error);
    }
  }),
  500
);

//throttle: Manda uma requisição a cada 500ms.
//debounce: Manda uma requisição depois que terminar de escrever.
