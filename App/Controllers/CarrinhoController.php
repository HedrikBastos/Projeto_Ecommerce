<?php

namespace App\Controllers;
use App\Models\Carrinho;
use App\Views\MainView;

class CarrinhoController
{

    //lembra de fazer uma limpeza, validação do que vai ser recebido
    public function index()
    {
        $carrinho = new Carrinho();
        $produtos = $carrinho->acessaProduct();
        $session = $carrinho->solicitaCarrinho();

        if (isset($_SESSION['login'])) {
        MainView::renderizar('carrinho',['session'=>$session]);
        } else {
            unset($_SESSION['login']);
            \App\Views\MainView::renderizar('login');
            die();
        }
    }
}


/*
//Adicionar produtos no carrinho
if (isset($_GET['add'])) {
    $id_produto = (int) $_GET['add'];
    if (isset($dados[$id_produto])) {
        if (isset($_SESSION['carrinho'][$id_produto])) {
            $_SESSION['carrinho'][$id_produto]['quantidade']++;
        } else {
            $_SESSION['carrinho'][$id_produto] = array('quantidade' => 1, 'nome' => $dados[$id_produto]['name'], 'preco' => $dados[$id_produto]['price']);
        }
    } else {
        die('Você não pode adicionar um item que não existe');
    }
}

//Subtrair produtos do carrinho (-)
if (isset($_POST['subtrai'])) {
    //Vamos adicionar ao carrinho
    $id_produto = (int) $_POST['subtrai'];
    if (isset($_SESSION['carrinho'])) {
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


//Adicionar produtos no carrinho (+)
if (isset($_POST['soma'])) {

    $id_produto = (int) $_POST['soma'];
    if (isset($_SESSION['carrinho'])) {
        if (isset($_SESSION['carrinho'][$id_produto])) {
            $_SESSION['carrinho'][$id_produto]['quantidade']++;
        } else {
            $_SESSION['carrinho'][$id_produto] = array('quantidade' => 1, 'nome' => $dados[$id_produto]['name'], 'preco' => $dados[$id_produto]['price']);
        }
    } else {
        die('Não tem mais produtos desse no seu carrinho!');
    }
}
*/