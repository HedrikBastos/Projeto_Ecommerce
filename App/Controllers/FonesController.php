<?php

namespace App\Controllers;

use App\Views\MainView;
use App\Models\Repository\ProductRepository;

class FonesController
{

    public function index()
    {

        $produtos = ProductRepository::selectProdutos();
        MainView::renderizar('fones', ['produtos' => $produtos]);

        /*  
        if (isset($_SESSION['login'])) {
            
        } else {
            unset($_SESSION['login']);
            MainView::renderizar('login');  
        }
      */
    }
}
