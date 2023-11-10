<?php

namespace App\Controllers;

use App\Models\Pedido;
use App\Views\MainView;
use App\Models\ItensPedido;
use App\Models\Service\CadastrarPedidoService;

class PedidoController
{
    public function index()
    {
        if (isset($_SESSION['login'])) {
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
                        $cadastraPedidoExecutado = $cadastraPedido->execute();
                        unset($_SESSION['carrinho']);
                    }

                    if ($cadastraPedidoExecutado === true) {
                        $_SESSION['mensagem'] = "Compra efetuada com sucesso!";
                        $_SESSION['condicao'] = "sucesso";
                        header('Location: perfil');
                        die();
                    }
                }

                if (isset($_POST['acaopedidoshow'])) {
                    $data = date("Y-m-d H:i:s");
                    $status = 'entregue';
                    $idProduto = $_POST['idproduto'];
                    $preco = $_POST['preco'];
                    $quantidade = $_POST['quantidade'];

                    $dadosPedido = new Pedido(
                        $_SESSION['id_usuario'],
                        $data,
                        $status
                    );

                    $itensPedido = new ItensPedido($idProduto, $quantidade, $preco);
                    $dadosPedido->adicionarItem($itensPedido);

                    if ($dadosPedido != null) {
                        $cadastraPedido = new CadastrarPedidoService($dadosPedido);
                        $cadastraPedidoExecutado = $cadastraPedido->execute();
                    }

                    if ($cadastraPedidoExecutado === true) {
                        $_SESSION['mensagem'] = "Compra efetuada com sucesso!";
                        $_SESSION['condicao'] = "sucesso";
                        header('Location: perfil');
                        die();
                    }
                }
            } catch (\Exception $e) {
                \App\Views\Notificador::notificar("Erro ao realizar compra, Tente novamente.", "erro");
                die();
            }
        } else {
            unset($_SESSION['login']);
            MainView::renderizar('login');
        }
    }
}
