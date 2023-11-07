<?php

namespace App\Controllers;

use App\Views\MainView;

class ProdutoController
{
    public function index()
    {
        if (isset($_SESSION['login']) && $_SESSION['login'] === 'admin@gmail.com') {
            MainView::renderizar('produto');
        } else {
            MainView::renderizar('login');
        }
    }
}
