<?php

namespace App\Controllers;

use App\Views\MainView;
use App\Models\Carrinho;

class JsonController
{
    public function index()
    {
        if (isset($_SESSION['login'])) {
            $carrinho = new Carrinho();
            $carrinho->json();

            MainView::renderizar('json');
            
        } else {
            unset($_SESSION['login']);
            MainView::renderizar('login');
        }
    }
}
