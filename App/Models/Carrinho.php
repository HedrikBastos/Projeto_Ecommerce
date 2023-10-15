<?php

namespace App\Models;

use App\Models\Repository\ProductRepository;

class Carrinho
{
    public function __construct(/*private readonly string $method*/)
    {
    }

    public function acessaProduct()
    {
        //ver se realmente tem necessidade de ter isso aqui ou pode colocar no solicitacarrinho
        $dados =  ProductRepository::select()->fetchAll();
        return $dados;
    }

    public function solicitaCarrinho()
    {

        $dadosProdutos = $this->acessaProduct();

        //Adicionar produtos no carrinho
        if (isset($_GET['add'])) {
            $id_produto = (int) $_GET['add'];

            if (isset($dadosProdutos[$id_produto])) {

                if (isset($_SESSION['carrinho'][$id_produto])) {
                    return  $_SESSION['carrinho'][$id_produto]['quantidade']++;
                } else {
                    return  $_SESSION['carrinho'][$id_produto] = array('quantidade' => 1, 'nome' => $dadosProdutos[$id_produto]['nome'], 'preco' => $dadosProdutos[$id_produto]['preco']);
                }
            } else {
                die('Você não pode adicionar um item que não existe');
            }
        }


        //Subtrair produtos do carrinho (-)
        if (isset($_POST['subtrai'])) {

            $id_produto = (int) $_POST['subtrai'];
            if (isset($_SESSION['carrinho'])) {
                if (isset($_SESSION['carrinho'][$id_produto])) {

                    if ($_SESSION['carrinho'][$id_produto]['quantidade'] > 0) {
                        return $_SESSION['carrinho'][$id_produto]['quantidade']--;
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

        //Adicionar produtos no carrinho (+)
        if (isset($_POST['soma'])) {

            $id_produto = (int) $_POST['soma'];
            if (isset($_SESSION['carrinho'])) {
                if (isset($_SESSION['carrinho'][$id_produto])) {
                    return  $_SESSION['carrinho'][$id_produto]['quantidade']++;
                } else {
                    return   $_SESSION['carrinho'][$id_produto] = array('quantidade' => 1, 'nome' => $dadosProdutos[$id_produto]['name'], 'preco' => $dadosProdutos[$id_produto]['price']);
                }
            } else {
                die('Não tem mais produtos desse no seu carrinho!');
            }
        }
    }
}
