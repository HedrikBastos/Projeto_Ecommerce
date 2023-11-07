<?php
namespace App\Controllers;
use App\Views\MainView;
use App\Models\Repository\ProductRepository;

class MonitoresController
{
    public function index()
    {
        if (isset($_SESSION['login'])) {
            $produtos = ProductRepository::selectProdutos();
            MainView::renderizar('monitores', ['produtos' => $produtos]);
        } else {
            unset($_SESSION['login']);
            MainView::renderizar('login');
        }
    }
}
