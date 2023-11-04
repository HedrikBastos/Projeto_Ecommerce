<?php

namespace App\Controllers;

use App\Views\MainView;
use App\Models\Repository\ProductRepository;

class JsonestoqueController
{

    public function index()
    {
        if (isset($_SESSION['login'])) {
            MainView::renderizar('jsonestoque');
            if (isset($_GET['produto'])) {
                $pesquisa = $_GET['produto'];
                $produtos = ProductRepository::selectNome($pesquisa);

                echo json_encode($produtos);
            }
        } else {
            unset($_SESSION['login']);
            MainView::renderizar('login');
        }
    }
}
