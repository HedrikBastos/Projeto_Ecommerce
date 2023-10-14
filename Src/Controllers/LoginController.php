<?php

namespace Src\Controllers;

use Src\DTOs\UserDTO;
use Src\Models\Service\VerificarUsuarioValidoService;
use Src\Models\Service\ValidaUsuarioService;
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
            echo $usuario->senha();
            try {
                $validarUsuario = new ValidaUsuarioService($usuario);
                $usuarioValido = $validarUsuario->execute();

                if ($usuarioValido === false) {

                    echo "Erro ao validar o usuário";
                    \Src\Views\MainView::renderizar('login');
                    die();
                } else {
                 
                    \Src\Views\MainView::renderizar('home');
                    echo "Usuário valido";
                    die();
                }
            } catch (TypeError $e) {
                echo "Usuário ou senha inválidos";
                exit;
            }
        } else {
            \Src\Views\MainView::renderizar('login');
            die();
        }
    }
}
