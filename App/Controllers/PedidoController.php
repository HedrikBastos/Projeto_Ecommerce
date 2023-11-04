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
            if (isset($_POST['acaopedido'])) {
               
                $produtos = $_SESSION['carrinho'];
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
                    $cadastraPedido = new CadastrarPedidoService($dadosPedido);
                    $cadastraPedidoExecutado =$cadastraPedido->execute();
                }
    
                if ($cadastraPedidoExecutado === true) {
                    \App\Views\Notificador::notificar("Compra efetuada com sucesso!","sucesso");
                    \App\Views\MainView::renderizar('perfil');
                    die();
                }
            }
        } catch (\Exception $e) {
            \App\Views\Notificador::notificar("Erro ao realizar compra, Tente novamente.","erro");
            die();
        }
    }
}
