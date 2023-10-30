<?php

namespace App\Controllers;

use App\Views\MainView;
use App\Models\Repository\ProductRepository;

class HomeController
{

    public function index()
    {

        $produtos = ProductRepository::selectProdutos();
        MainView::renderizar('home', ['produtos' => $produtos]);

        /*  
        if (isset($_SESSION['login'])) {
            
        } else {
            unset($_SESSION['login']);
            MainView::renderizar('login');  
        }
      */
    }
}
