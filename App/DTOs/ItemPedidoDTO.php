<?php

namespace App\DTOs;

class ItemPedidoDTO
{
    private $idPedido;
    private $idProduto;
    private $quantidade;
    private $preco;

    public function __construct($idProduto, $quantidade, $preco)
    {
        $this->idProduto = $idProduto;
        $this->quantidade = $quantidade;
        $this->preco = $preco;
    }

    public function IdPedido()
    {
        return $this->idPedido;
    }

    public function getIdProduto()
    {
        return $this->idProduto;
    }


    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;
    }
}

