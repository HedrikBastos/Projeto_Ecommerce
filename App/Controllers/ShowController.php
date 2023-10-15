<?php

namespace App\Controllers;
use App\Models\Carrinho;
use App\Views\MainView;

class ShowController
{
    public function index()
    {
        $carrinho = new Carrinho();
        $produtos = $carrinho->acessaProduct();
        
        MainView::renderizar('show', [ 'produtos'=>$produtos ]);
    }

}
