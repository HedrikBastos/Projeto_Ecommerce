<?php

namespace App\Controllers;

use App\Models\ItensPedido;
use App\Models\Pedido;
use App\Models\Service\CadastrarPedidoService;

class PedidoController
{
    public function index()
    {

        try {
            if (isset($_POST['acao'])) {
                $produtos = [['id_produto' => 4, 'quantidade' => 1, 'preco' => 300]];
                $data = date("Y-m-d H:i:s");
                $status = 'entregue';

                $dadosPedido = new Pedido(
                    $_SESSION['id_usuario'],
                    $data,
                    $status
                );

                foreach ($produtos as $produto) {
                    $idProduto = $produto['id_produto'];
                    $quantidade = $produto['quantidade'];
                    $preco = ($produto['preco'] * $produto['quantidade']);
                    $itensPedido = new ItensPedido($idProduto, $quantidade, $preco);
                    $dadosPedido->adicionarItem($itensPedido);
                }

                if ($dadosPedido != null) {
                    $cadastraPedidoExecutado = new CadastrarPedidoService($dadosPedido);
                }

                if ($cadastraPedidoExecutado === true) {
                    header("Location: perfil");
                    die();
                }
            }
        } catch (\Exception $e) {
        }
    }
}
