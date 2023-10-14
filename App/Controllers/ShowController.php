<?php

namespace App\Controllers;
use App\Models\Carrinho;
use App\Views\MainView;

class ShowController
{
    public function index()
    {
        $carrinho = new Carrinho();
        $produtos = $carrinho->acessaProduct();
        
        if (isset($_SESSION['login'])) {
        MainView::renderizar('show', [ 'produtos'=>$produtos ]);
        } else {
            unset($_SESSION['login']);
            \App\Views\MainView::renderizar('login');  
        }
    }

}
