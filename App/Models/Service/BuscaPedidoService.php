<?php

namespace App\Models\Service;

use App\Config\Connection;
use App\Models\Carrinho;

class BuscaPedidoService
{

    public function execute(): bool | array
    {

        $id_usuario = $_SESSION['id_usuario'];

        try {
            $conexao = Connection::connect();
            $querypedido = $conexao->prepare("SELECT p.id_pedido, p.data, p.status, i.id_produto, i.quantidade, i.preco FROM pedidos p INNER JOIN itens_pedido i on p.id_pedido = i.id_pedido WHERE p.id_usuario = :id_usuario");

            $querypedido->bindParam(":id_usuario", $id_usuario, \PDO::PARAM_INT);

            $querypedido->execute();

            $pedidos = $querypedido->fetchAll(\PDO::FETCH_ASSOC);
            if ($pedidos === false) {
                return false;
            }
        
            $resultados = [];

            foreach ($pedidos as $pedido) {
                $idProdutoPedido = $pedido['id_produto'];
            
                $queryProduto = $conexao->prepare("SELECT * FROM produtos WHERE id = :id");
                $queryProduto->bindParam(':id', $idProdutoPedido);
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
            echo "Erro ao buscar pedido";
        }
    }
}
