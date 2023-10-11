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

    $verificaService = new VerificarUsuarioValidoService($usuarioValidoDTO);
    $usuario = $verificaService->execute();

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
    \App\Views\MainView::renderizar('login');
    die();
}
