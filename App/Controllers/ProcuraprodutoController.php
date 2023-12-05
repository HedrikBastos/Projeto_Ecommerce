<?php

namespace App\Controllers;


use App\Views\MainView;
use App\Models\Repository\ProductRepository;

class ProcuraprodutoController
{
     
    public function index()
    {
        MainView::renderizar('procuraprodutojson');
        if (isset($_GET['procuraproduto']) && !empty($_GET['procuraproduto'])) {
          
            $procuraProduto = $_GET['procuraproduto'];
            $resultado = ProductRepository::selectNome($procuraProduto);

            echo json_encode($resultado);
        } else {
            MainView::renderizar('procuraprodutojson');
            echo json_encode([]);           
        }
    }
}
