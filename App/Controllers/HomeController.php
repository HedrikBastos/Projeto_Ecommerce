<?php

namespace App\Controllers;
use App\Models\Carrinho;

class HomeController
{

    public function index()
    {
        if (isset($_SESSION['login'])) {
            $carrinho = new Carrinho();
            $produtos = $carrinho->acessaProduct();
            $session = $carrinho->solicitaCarrinho();
    
            \App\Views\MainView::renderizar('home', ['produtos' => $produtos]);
        } else {
            unset($_SESSION['login']);
            \App\Views\MainView::renderizar('login');  
        }

    }
}
