<?php

namespace App\Controllers;

use App\Views\MainView;
use App\Models\Repository\ProductRepository;

class HomeController
{
    public function index()
    {
        $produtos = ProductRepository::selectProdutos();
        if (isset($_SESSION['login'])) {
            MainView::renderizar('home', ['produtos' => $produtos]);
        } else {
            unset($_SESSION['login']);
            MainView::renderizar('login');
        }
    }
}
