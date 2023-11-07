<?php

namespace App\Controllers;

use App\Models\Service\BuscaPedidoService;

class BuscaPedidoController
{
    public function execute(): false | array
    {
        $buscaPedido = new BuscaPedidoService();
        $pedidoExecutado = $buscaPedido->execute();

        return $pedidoExecutado;
    }
}
