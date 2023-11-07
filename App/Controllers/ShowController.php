<?php

namespace App\Controllers;

use App\Models\Repository\ProductRepository;
use App\Views\MainView;
use App\Models\Carrinho;


class ShowController
{
    public function index($parameter = null)
    {

        if (isset($_SESSION['login'])) {
            $produtos = ProductRepository::selectProdutos();
            $cart = new Carrinho();
            $cart->solicitaCarrinho();

            if ($parameter == null) {
                header('location:home');
            } else {
                MainView::renderizar('show', ['produtos' => $produtos, 'parameter' => $parameter]);
            }
        } else {
            unset($_SESSION['login']);
            MainView::renderizar('login');
        }
    }
}
