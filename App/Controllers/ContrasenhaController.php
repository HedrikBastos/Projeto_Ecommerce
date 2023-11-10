<?php
namespace App\Controllers;

use TypeError;
use App\DTOs\UserDTO;
use App\Models\Service\ValidaContraSenhaService;
use App\Models\Service\VerificaContraSenhaService;

class ContrasenhaController
{

    public function index()
    {
        if (isset($_POST['acao'])) {
            $email = $_POST['email'];
            $contraSenha = $_POST['contraSenha'];
            $_SESSION['redefinicaoSenha']  = $_POST['redefinicaoSenha'];
            $usuarioValidoDTO = new UserDTO(
                '',
                '',
                '',
                '',
                $email,
                '',
                '',
                $contraSenha
            );

            $verificaService = new VerificaContraSenhaService($usuarioValidoDTO);
            $contraSenha = $verificaService->execute();

            try {
                $validarContraSenha = new ValidaContraSenhaService($contraSenha);
                $contraSenhaValida =  $validarContraSenha->execute();

                if ($contraSenhaValida === false) {
                    \App\Views\MainView::renderizar('recuperarsenha');
                    \App\Views\Notificador::notificar('Email inválido', 'erro');
                    die();
                }
                
                \App\Views\MainView::renderizar('alterasenha');
                die();
            } catch (TypeError $e) {
                \App\Views\MainView::renderizar('recuperarsenha');
                \App\Views\Notificador::notificar("Contra Senha inválida", "erro");
                die();
            }
        } else {
            \App\Views\MainView::renderizar('login');
            die();
        }
    }
}
