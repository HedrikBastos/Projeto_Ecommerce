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

        \App\Views\MainView::renderizar('home', ['produtos' => $produtos]);

        //Comentei pq enquanto não estiver funcionando o login não consigo testar
        /*
        if (isset($_SESSION['login'])) {
            
        } else {
            unset($_SESSION['login']);
            \App\Views\MainView::renderizar('login');  
        }

        */
    }
}
