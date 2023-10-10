<?php

// Cart = Carrinho em português, quando a gente finalizar o projeto apago os comentários para ficar limpo

require_once(__DIR__ . '../../../vendor/autoload.php');

use Src\Models\Repository\ProductRepository;                                    


$ProductRepository = new ProductRepository();

$sql = $ProductRepository->select();

$dados = $sql->fetchAll();

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

