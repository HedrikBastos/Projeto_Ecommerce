<?php

namespace App\Controllers;
use App\Views\MainView;
use App\Models\Carrinho;


class CarrinhoController
{

    public function index()
    {
        $cart = new Carrinho();
        $cart->solicitaCarrinho();

        MainView::renderizar('carrinho');
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

