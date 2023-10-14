<?php

namespace Src\Controllers;

use Src\DTOs\EnderecoDTO;
use Src\DTOs\UserDTO;
use Src\Models\Service\VerificarCadastroService;
use Src\Models\Service\CadastrarUsuarioService;

class CadastroController
{
    public function index()
    {
        if (isset($_POST['acao'])) {
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $genero = $_POST['genero'];                    
            $cpf = $_POST['cpf'];
            $email = $_POST['email']; 
            $senha = $_POST['senha'];
            $confirmarSenha = $_POST['confirmarSenha'];
            $usuarioDTO = new UserDTO(
                $nome,
                $sobrenome,
                $genero,
                $cpf,
                $email,
                $senha,
                $confirmarSenha
            );

           /* $enderecoDTO = new EnderecoDTO(
                $_POST['rua'],
                $_POST['numero'],
                $_POST['complemento'],
                $_POST['bairro'],
                $_POST['cidade'],
                $_POST['uf'],
                $_POST['cep'],
                $_POST['telefone']
            );

            */

            $verificarService = new VerificarCadastroService($usuarioDTO);
            $usuario = $verificarService->execute();
            try {
                if($usuario != null){$cadastrarService = new CadastrarUsuarioService($usuario);
                $cadastroExecutado = $cadastrarService->execute();

                }
                if ($cadastroExecutado == true) {
                    echo "<script>alert('Cadastro realizado com sucesso!')</script>";
                } else {
                    echo "<script>alert('Cadastro não realizado!')</script>";
                    \Src\Views\MainView::renderizar('register');
                }
               
            } catch (\TypeError $e) {

            die();
            }
        }
    }
}
