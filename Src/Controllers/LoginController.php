<?php

use Src\Models\UserDTO;
use Src\Models\Service\VerificarUsuarioValidoService;
use Src\Models\Service\ValidaUsuarioService;
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
}else {
    \src\Views\MainView::renderizar('login');
    die();
}