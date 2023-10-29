<?php

namespace App\Models\Service;

use App\Models\Pedido;
use App\Config\Connection;

class CadastrarPedidoService
{
    public function __construct(
        private readonly Pedido $pedido,
    ) {
        try {
            $idUsuario = $this->$pedido->idUsuario();
            $data = $this->$pedido->data();
            $itens = $this->$pedido->itens();
            $status = $this->$pedido->status();

            $conexao = Connection::connect();
            $conexao->beginTransaction();

            $cadastrarPedido = $conexao->prepare("INSERT INTO pedidos (`id_usuario`, `data`, `status`)
            VALUES (`:idusuario`,`:data`, `:status`");
            $cadastrarPedido->bindValue(':data', $data, \PDO::PARAM_STR);
            $cadastrarPedido->bindValue(':status', $status, \PDO::PARAM_STR);
            $cadastrarPedido->bindValue(':idusuario', $idUsuario, \PDO::PARAM_INT);
            $cadastrarPedido->execute();

            $ultimoIdPedido = $conexao->lastInsertId();

            foreach ($itens as $item) {
                $cadastraItem = $conexao->prepare("INSERT INTO itens_pedido (id_pedido, id_produto, quantidade, preco) VALUES (:id_pedido, :id_produto, :quantidade, :preco");
                $cadastraItem->bindValue(':id_pedido', $ultimoIdPedido, \PDO::PARAM_INT);
                $cadastraItem->bindValue(':id_produto', $item['id_produto'], \PDO::PARAM_INT);
                $cadastraItem->bindValue(':quantidade', $item['quantidade'], \PDO::PARAM_INT);
                $cadastraItem->bindValue(':preco', $item['preco'], \PDO::PARAM_STR);
                $cadastraItem->execute();
            }

            $conexao->commit();
            return true;
        } catch (\PDOException $e) {
        }
    }
}
