<?php

namespace App\Models;

use App\Models\Repository\ProductRepository;

class Carrinho
{
    public function solicitaCarrinho()
    {
        $dadosProdutos = ProductRepository::selectProdutos();

        if (isset($_POST['acao']) && $_POST['acao'] == 'adicionar') {
            $id_produto = (int) $_POST['produtoID'];

            // Verifique se o produto existe na lista de produtos
            $produtoEncontrado = null;
            foreach ($dadosProdutos as $produto) {
                if ($produto['id_produto'] == $id_produto) {
                    $produtoEncontrado = $produto;
                    break;
                }
            }

            if ($produtoEncontrado) {
                $nome = $produtoEncontrado['nome'];
                $preco = $produtoEncontrado['preco'];
                $imagem = $produtoEncontrado['imagem'];

                // Verifique se o produto já existe no carrinho
                $produtoNoCarrinho = false;
                foreach ($_SESSION['carrinho'] as &$item) {
                    if ($item['id_produto'] == $id_produto) {
                        $item['quantidade']++;
                        $produtoNoCarrinho = true;
                        break;
                    }
                }

                if (!$produtoNoCarrinho) {
                    // Encontre o próximo índice disponível no carrinho
                    $indice = 0;
                    while (isset($_SESSION['carrinho'][$indice])) {
                        $indice++;
                    }

                    // Adicione o produto no carrinho
                    $_SESSION['carrinho'][$indice] = array('id_produto' => $id_produto, 'quantidade' => 1, 'nome' => $nome, 'preco' => $preco, 'imagem' => $imagem);
                }
            } else {
                die('Produto não encontrado na lista de produtos!');
            }
        }

        // Subtrair produtos do carrinho (-)
        if (isset($_POST['acao']) && $_POST['acao'] == 'subtrair') {
            $id_produto = (int) $_POST['produtoID'];

            // Encontre o índice correto do produto no carrinho
            $produtoEncontradoNoCarrinho = false;
            $produtoIndex = null;

            foreach ($_SESSION['carrinho'] as $indice => $item) {
                if ($item['id_produto'] == $id_produto) {
                    $produtoIndex = $indice;
                    $produtoEncontradoNoCarrinho = true;
                    break;
                }
            }

            if ($produtoEncontradoNoCarrinho) {
                // Subtrair a quantidade corretamente
                if ($_SESSION['carrinho'][$produtoIndex]['quantidade'] > 0) {
                    $_SESSION['carrinho'][$produtoIndex]['quantidade']--;

                    if ($_SESSION['carrinho'][$produtoIndex]['quantidade'] === 0) {
                        unset($_SESSION['carrinho'][$produtoIndex]);
                    }
                } else {
                    return;
                }
            } else {
                die('Produto não encontrado no carrinho!');
            }
        }
    }


    public function json()
    {
        if (isset($_SESSION['carrinho'])) {
            echo json_encode($_SESSION['carrinho']);
        }
    }
}
