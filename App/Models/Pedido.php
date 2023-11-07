<?php

namespace App\Models;

use App\Models\ItensPedido;

class Pedido {
    private $idPedido;
    private $idUsuario;
    private $data;
    private $status;
    private $itens;

    public function __construct($idUsuario, $data, $status)
    {
        $this->idUsuario = $idUsuario;
        $this->data = $data;
        $this->status = $status;
        $this->itens = array();
    }

    public function adicionarItem(ItensPedido $item)
    {
        $this->itens[] = $item;
    }

    public function itens()
    {
        return $this->itens;
    }

    public function Status()
    {
        return $this->status;
    }

    public function data()
    {
        return $this->data;
    }

    public function idUsuario()
    {
        return $this->idUsuario;
    }

    public function IdPedido()
    {
        return $this->idPedido;
    }

    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;
    }
}

