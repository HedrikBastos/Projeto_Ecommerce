<?php

namespace App\Controllers;

use App\DTOs\UserDTO;
use App\Models\Service\VerificarUsuarioValidoService;
use App\Models\Service\ValidaUsuarioService;
use TypeError;

class LoginController
{

    public function index()
    {

        if (isset($_POST['acao'])) {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $usuarioValidoDTO = new UserDTO(
                '',
                '',
                '',
                '',
                $email,
                $senha,
                ''
            );

            $verificaService = new VerificarUsuarioValidoService($usuarioValidoDTO);
            $usuario = $verificaService->execute();

            try {
                $validarUsuario = new ValidaUsuarioService($usuario);
                $usuarioValido = $validarUsuario->execute();

                if ($usuarioValido === false) {

                    echo "Erro ao validar o usuário";
                    \App\Views\MainView::renderizar('login');
                    die();
                } else {
                    header('location:home');
                    die();
                }
            } catch (TypeError $e) {
                echo "Usuário ou senha inválidos";
                \App\Views\MainView::renderizar('login');
                exit;
            }
        } else {
            \App\Views\MainView::renderizar('login');
            die();
        }
    }
}
