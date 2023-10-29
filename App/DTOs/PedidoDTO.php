<?php

namespace App\DTOs;

class PedidoDTO
{
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

    public function adicionarItem(ItemPedidoDTO $item)
    {
        $this->itens[] = $item;
    }

    public function Itens()
    {
        return $this->itens;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getIdPedido()
    {
        return $this->idPedido;
    }

    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;
    }
}
