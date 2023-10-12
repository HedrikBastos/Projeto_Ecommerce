<?php

namespace Src\Controllers;

use Src\Models\UserDTO;
use Src\Models\Service\VerificarUsuarioValidoService;
use Src\Models\Service\ValidaUsuarioService;
use TypeError;

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

            $verificaService = new VerificarUsuarioValidoService();
            $usuario = $verificaService->execute($usuarioValidoDTO);

            try {
                $validarUsuario = new ValidaUsuarioService($usuario);
                $usuarioValido = $validarUsuario->execute();

                if ($usuarioValido === false) {

                    echo "Erro ao validar o usuário";

                    exit;
                } else {

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
