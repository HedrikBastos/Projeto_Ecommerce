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
            $contraSenha = $_POST['contraSenha'];

            $usuarioDTO = new UserDTO(
                $nome,
                $sobrenome,
                $genero,
                $cpf,
                $email,
                $senha,
                $confirmarSenha,
                $contraSenha
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
                    sleep(1);
                    $cadastrarEndereco = new CadastrarEnderecoService($endereco);

                    $cadastroEnderecoExecutado = $cadastrarEndereco->execute();
                }

                if ($cadastroUsuarioExecutado === true && $cadastroEnderecoExecutado === true) {
                    header("Location: home");
                    die();
                } else {
                    $_SESSION['mensagem'] = "Cadastro não realizado, Verifique e tente novamente!";
                    $_SESSION['condicao'] = "erro";
                    header('Location: register');
                    die();
                }
            } catch (\TypeError $e) {
                $_SESSION['mensagem'] = "Email já cadastrado, Verifique e tente novamente!";
                $_SESSION['condicao'] = "erro";
                header('Location: register');
                die();
            }
        } else {
            $_SESSION['mensagem'] = "Cadastro não realizado, Verifique e tente novamente!";
            $_SESSION['condicao'] = "erro";
            header('Location: register');
            die();
        }
    }
}
