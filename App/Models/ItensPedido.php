<?php

namespace App\Models;


class ItensPedido
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

    public function idProduto()
    {
        return $this->idProduto;
    }


    public function quantidade()
    {
        return $this->quantidade;
    }

    public function preco()
    {
        return $this->preco;
    }

    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;
    }
}
