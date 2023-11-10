<?php

namespace App\Controllers;

use App\Models\Repository\UserRepository;
use App\Models\Repository\EnderecoRepository;

class PerfilController
{

    public function index()
    {
        $opcaoMenu = 'pedidos';
        if (isset($_GET['value'])) {
            if ($_GET['value'] != 'pedidos' && $_GET['value'] != 'alterausuario' && $_GET['value'] != 'alteraendereco') {
                include('erro404.php');
                die();
            }
            $opcaoMenu = $_GET['value'];
        }

        $buscaPedidos = new BuscaPedidoController();
        $pedidos = $buscaPedidos->execute();


        $dadosUsuario = new UserRepository();
        $usuario = $dadosUsuario->buscaUsuario($_SESSION['id_usuario']);

        $dadosEndereco = new EnderecoRepository();
        $endereco = $dadosEndereco->buscaEndereco($_SESSION['id_usuario']);

        \App\Views\MainView::renderizar('perfil', [
            'opcaoMenu' => $opcaoMenu,
            'pedidos' => $pedidos,
            'usuario'=>$usuario,
            'endereco' => $endereco
        ]);
    }
}
