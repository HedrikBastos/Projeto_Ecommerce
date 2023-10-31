<?php

namespace App\Controllers;
use App\Views\MainView;
use App\Models\Carrinho;

class JsonController
{

    public function index()
    {
        $carrinho = new Carrinho();
        $carrinho->json();

        MainView::renderizar('json');
        /*
        if (isset($_SESSION['login'])) {
            
        } else {
            unset($_SESSION['login']);
            MainView::renderizar('login');
            die();
        }
        */
    }
}

