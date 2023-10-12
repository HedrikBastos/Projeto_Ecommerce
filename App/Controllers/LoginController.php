<?php

use App\Models\UserDTO;
use App\Models\Service\VerificarUsuarioValidoService;
use App\Models\Service\ValidaUsuarioService;

if (isset($_POST['acao'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usuarioValidoDTO = new UserDTO(
        '',
        '',
        $email,
        $password,
        ''
    );

class LoginController
{

    public function index()
    {

        if (isset($_POST['acao'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $usuarioValidoDTO = new UserDTO(
                '',
                '',
                $email,
                $password,
                ''
            );

            echo "Erro ao validar o usuário";

            exit;
        } else{

            echo "Usuário valido";
            die();
        }
    }
} else {
    \App\Views\MainView::renderizar('login');
    die();
}
