<?php

namespace App\Controllers;

use App\DTOs\EnderecoDTO;
use App\DTOs\UserDTO;
use App\Models\Service\ValidaCadastroService;
use App\Models\Service\CadastrarUsuarioService;
use App\Models\Service\ValidaEnderecoService;
use App\Models\Service\CadastrarEnderecoService;

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

            $enderecoDTO = new EnderecoDTO(
                $_POST['rua'],
                $_POST['numero'],
                $_POST['complemento'],
                $_POST['bairro'],
                $_POST['cidade'],
                $_POST['uf'],
                $_POST['cep'],
                $_POST['telefone']
            );


            $validarUsuario = new ValidaCadastroService($usuarioDTO);
            $usuario = $validarUsuario->execute();

            $validarEndereco = new ValidaEnderecoService($enderecoDTO);
            $endereco = $validarEndereco->executeEndereco();

            try {
                if ($usuario != null && $endereco != null) {

                    $cadastrarUsuario = new CadastrarUsuarioService($usuario);

                    $cadastroUsuarioExecutado = $cadastrarUsuario->execute();

                    $cadastrarEndereco = new CadastrarEnderecoService($endereco);

                    $cadastroEnderecoExecutado = $cadastrarEndereco->execute();
                }

                if (isset($cadastroUsuarioExecutado) === true && $cadastroEnderecoExecutado === true) {
                    header("Location: home");
                    die();
                } else {
                    echo "<script>alert('Cadastro não realizado!')</script>";
                    \App\Views\MainView::renderizar('register');
                }
            } catch (\TypeError $e) {
                echo $e;
                \App\Views\MainView::renderizar('register');
                die();
            }
        }
    }
}
