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
            }

            if (isset($dadosProdutos[$id_produto])) {
                if (isset($_SESSION['carrinho'][$id_produto])) {
                    $_SESSION['carrinho'][$id_produto]['quantidade']++;
                } else {
                    $_SESSION['carrinho'][$id_produto] = array('id_produto' => $id_produto, 'quantidade' => 1, 'nome' => $nome, 'preco' => $preco);
                }
            } else {
                die('Não tem mais produtos desse no seu carrinho!');
            }
          
        }

        //Subtrair produtos do carrinho (-)
        if (isset($_POST['acao']) && $_POST['acao'] == 'subtrair') {

            $id_produto = (int) $_POST['produtoID'];

            if (isset($dadosProdutos[$id_produto])) {
                if (isset($_SESSION['carrinho'][$id_produto])) {

                    if ($_SESSION['carrinho'][$id_produto]['quantidade'] > 0) {
                        $_SESSION['carrinho'][$id_produto]['quantidade']--;
                    } else {

                        return;
                    }
                } else {
                    die('Não tem mais produtos desse no seu carrinho!');
                }
            } else {
                die('Não tem mais produtos desse no seu carrinho!');
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
