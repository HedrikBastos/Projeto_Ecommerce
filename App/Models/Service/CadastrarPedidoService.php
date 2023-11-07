<?php

namespace App\Models\Service;

use App\Models\Pedido;
use App\Config\Connection;

class CadastrarPedidoService
{
    public function __construct(
       private readonly Pedido $pedido
    ) {
    }

    public function execute(): bool
    {
        try {
            $idUsuario = $this->pedido->idUsuario();
            $data = $this->pedido->data();
            $itens = $this->pedido->itens();
            $status = $this->pedido->status();
            $conexao = Connection::connect();
            $conexao->beginTransaction();

            $cadastrarPedido = $conexao->prepare("INSERT INTO pedidos (id_usuario, data, status)
            VALUES (:id_usuario, :data, :status)");
            $cadastrarPedido->bindValue(':id_usuario', $idUsuario, \PDO::PARAM_INT);
            $cadastrarPedido->bindValue(':data', $data, \PDO::PARAM_STR);
            $cadastrarPedido->bindValue(':status', $status, \PDO::PARAM_STR);
            $cadastrarPedido->execute();

            $ultimoIdPedido = $conexao->lastInsertId();

            foreach ($itens as $item) {
                $idProduto = $item->IdProduto();
                $quantidade = $item->Quantidade();
                $preco = $item->Preco();

                $cadastraItem = $conexao->prepare("INSERT INTO itens_pedido (id_pedido, id_produto, quantidade, preco) VALUES (:id_pedido, :id_produto, :quantidade, :preco)");
                $cadastraItem->bindValue(':id_pedido', $ultimoIdPedido, \PDO::PARAM_INT);
                $cadastraItem->bindValue(':id_produto', $idProduto, \PDO::PARAM_INT);
                $cadastraItem->bindValue(':quantidade', $quantidade, \PDO::PARAM_INT);
                $cadastraItem->bindValue(':preco', $preco, \PDO::PARAM_STR);
                $cadastraItem->execute();
            }

            $conexao->commit();

            return true;
        } catch (\PDOException $e) {
            Connection::connect()->rollBack();

            return false;
        }
    }
}
