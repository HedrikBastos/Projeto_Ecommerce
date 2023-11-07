<?php

namespace App\Controllers;

use App\Views\MainView;
use App\Models\Repository\ProductRepository;

class SmartphonesController
{

    public function index()
    {

        if (isset($_SESSION['login'])) {
            $produtos = ProductRepository::selectProdutos();
            MainView::renderizar('smartphones', ['produtos' => $produtos]);
        } else {
            unset($_SESSION['login']);
            MainView::renderizar('login');
        }
    }
}
