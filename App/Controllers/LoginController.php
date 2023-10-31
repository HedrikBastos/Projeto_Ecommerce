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

                    \App\Views\MainView::renderizar('login', ['mesage' => 'Email  inválido']);
                    die();
                } else {
                    header('location:home');
                    die('Seja bem vindo');
                }
            } catch (TypeError $e) {

                \App\Views\MainView::renderizar('login', ['mesage' => 'senha inválida']);
                die();
            }
        } else {
            \App\Views\MainView::renderizar('login');
            die();
        }
    }
}
