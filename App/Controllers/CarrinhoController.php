<?php

namespace App\Controllers;
use App\Views\MainView;
use App\Models\Carrinho;


class CarrinhoController
{

    public function index()
    {
        $cart = new Carrinho();
        $carrinho = $cart->solicitaCarrinho();

        MainView::renderizar('carrinho',['carrinho'=>$carrinho]);

        if (isset($_POST['finalizar'])) {

            $produtos = $_SESSION['carrinho'];

            foreach ($produtos as $key => $value) {
        
                echo $value['nome'];
                echo 'R$' . $value['preco'] ;
                echo $value['id_produto'];
            }
        }


        /*
        if (isset($_SESSION['login'])) {
            
        } else {
            unset($_SESSION['login']);
            MainView::renderizar('login');
            die();
        }
        */
    }
}

