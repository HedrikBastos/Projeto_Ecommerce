<?php

namespace App\Models\Service;

use App\Config\Connection;

class BuscaPedidoService
{

    public function execute(): bool | array
    {

        $id_usuario = $_SESSION['id_usuario'];

        try {
            $conexao = Connection::connect();
            $querypedido = $conexao->prepare("SELECT p.id_pedido, p.data, p.status, i.id_produto, i.quantidade, i.preco FROM pedidos p INNER JOIN itens_pedido i on p.id_pedido = i.id_pedido WHERE p.id_usuario = :id_usuario");

            $querypedido->bindValue(":id_usuario", $id_usuario, \PDO::PARAM_INT);

            $querypedido->execute();

           

            $pedidos = $querypedido->fetchAll(\PDO::FETCH_ASSOC);
            if ($pedidos === false) {
                return false;
            }

            $resultados = [];

            foreach ($pedidos as $pedido) {
                $idProdutoPedido = $pedido['id_produto'];
                $queryProduto = $conexao->prepare("SELECT * FROM produtos WHERE id_produto = :id_produto");
                $queryProduto->bindValue(':id_produto', $idProdutoPedido,\PDO::PARAM_INT);
                $queryProduto->execute();
               

                $produto = $queryProduto->fetch(\PDO::FETCH_ASSOC);

                $resultado = [
                    'pedido' => $pedido,
                    'produto' => $produto,
                ];

                $resultados[] = $resultado;
              
            }

            return $resultados;
        } catch (\PDOException $e) {
           \App\Views\Notificador::notificar("Erro ao buscar pedidos","erro");
           die();
        }
    }
}
