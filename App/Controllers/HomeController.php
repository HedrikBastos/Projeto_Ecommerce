<?php

namespace App\Controllers;
use App\Models\Carrinho;

class HomeController
{

    public function index()
    {
        $carrinho = new Carrinho();
        $produtos = $carrinho->acessaProduct();
        $session = $carrinho->solicitaCarrinho();

        
        if (isset($_SESSION['login'])) {
            \App\Views\MainView::renderizar('home', ['produtos' => $produtos]);
        } else {
            unset($_SESSION['login']);
            \App\Views\MainView::renderizar('login');  
        }

    }
}
