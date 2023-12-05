document.addEventListener("DOMContentLoaded", function () {

    $('#procuraProduto').on('input', function () {
        procuraProduto();
    });

});

const INCLUDE_PATH_STATIC = '/html/Projeto_Ecommerce/App/assets/';

function procuraProduto() {

    var procuraProduto = $('#procuraProduto').val();

    $.ajax({
        type: 'GET',
        url: 'http://localhost/html/Projeto_Ecommerce/procuraproduto',
        data: { procuraproduto: procuraProduto },
        dataType: 'json',
        success: function (data) {

            mostraResultado(data);
        },
        error: function () {

            console.error('Erro na requisição AJAX');
        }
    });
}

function mostraResultado(resultado) {
    var produtosContainer = $('#produtos');
    if (resultado.length > 0) {
        produtosContainer.empty();
        resultado.forEach(function (produto) {
            var novoLink = $('<a>').attr('href', 'show/' + produto.id_produto).addClass('produtos flex flex-col items-center justify-center text-center relative border-hidden border-[1px] border-black hover:border-solid w-[90px] sm:w-[200px]');
            novoLink.append($('<img>').addClass('w-[200px]').attr('src', INCLUDE_PATH_STATIC + produto.imagem).attr('alt', ''));
            novoLink.append($('<p>').addClass('text-[9px] w-[150px] sm:text-xs').text(produto.nome));
            novoLink.append($('<p>').addClass('text-xs font-semibold text-[#E01D25] sm:text-sm').text('R$' + parseFloat(produto.preco).toFixed(2).replace('.', ',')));
            produtosContainer.append(novoLink);
        });

    } else {
        produtosContainer.load(location.href + " #produtos");
    }
}
