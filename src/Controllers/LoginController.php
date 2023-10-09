<?php

use src\Models\UserDTO;
use src\Models\Service\VerificarUsuarioValidoService;
use src\Models\Service\ValidaUsuarioService;
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
            
            header("Location: Site.php");
            
        }
    } catch (TypeError $e) {

        header("Location: ../index.php");
        $_SESSION['erro'] = "Usuário ou senha inválidos";
        exit;
    }
}
