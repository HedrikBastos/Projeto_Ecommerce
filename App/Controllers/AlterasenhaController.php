<?php

namespace App\Controllers;

use App\DTOs\UserDTO;
use App\Models\Service\AlteraSenhaService;
use App\Models\Service\ValidaSenhaService;

class AlterasenhaController
{
    public function index()
    {
        if (isset($_POST['acao'])) {
            $senha = $_POST['senha'];
            $confirmarSenha = $_POST['confirmarSenha'];

            $usuarioDTO = new UserDTO(
                '',
                '',
                '',
                '',
                '',
                $senha,
                $confirmarSenha,
                ''
            );

            $validarSenhaUsuario = new ValidaSenhaService($usuarioDTO);
            $senhaUsuario =  $validarSenhaUsuario->execute();

            try {
                if ($senhaUsuario != null) {
                    $alterarSenha = new AlteraSenhaService($senhaUsuario);
                    $alterarSenhaExecutado = $alterarSenha->execute();
                }

                if ($alterarSenhaExecutado === true) {
                    $_SESSION['mensagem'] = "Senha alterada com sucesso!";
                    $_SESSION['condicao'] = "sucesso";
                    header('Location: login');
                    die();
                }
            } catch (\TypeError $e) {
                $_SESSION['mensagem'] = "Tente novamente";
                $_SESSION['condicao'] = "erro";
                header('Location: login');
                die();
            }
        } else {
            \App\Views\Notificador::notificar("Erro ao alterar senha, Verifique e tente novamente!", "erro");
            \App\Views\MainView::renderizar('alterasenha');
            die();
        }
    }
}
