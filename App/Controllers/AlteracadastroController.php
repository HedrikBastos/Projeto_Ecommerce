<?php

namespace App\Controllers;

use App\DTOs\UserDTO;
use App\DTOs\EnderecoDTO;
use App\Models\Repository\EnderecoRepository;
use App\Models\Repository\UserRepository;
use App\Models\Service\ValidaCadastroService;
use App\Models\Service\ValidaEnderecoService;

class AlteracadastroController
{
    public function index()
    {
        if (isset($_POST['acao']) && isset($_POST['alterausuario'])) {
            $this->alteraCadastroUsuario();
        }

        if (isset($_POST['acao']) && isset($_POST['alteraendereco'])) {
            $this->alteraCadastroEndereco();
        }
    }

    protected function alteraCadastroUsuario()
    {

        $usuarioDTO = new UserDTO(
            $_POST['nome'],
            $_POST['sobrenome'],
            $_POST['genero'],
            $_POST['cpf'],
            $_POST['email'],
            $_POST['senha'],
            $_POST['confirmarSenha'],
            $_POST['contraSenha']
        );

        $validarUsuario = new ValidaCadastroService($usuarioDTO);
        $usuario = $validarUsuario->execute();

        try {
            if ($usuario != null) {
                $alterarUsuario = new UserRepository();
                $alterarUsuarioExecutado = $alterarUsuario->atualizaUsuario($usuario);
            }

            if ($alterarUsuarioExecutado === true) {
                $_SESSION['mensagem'] = "Cadastro alterado com sucesso!";
                $_SESSION['condicao'] = "sucesso";
                header('Location: perfil?value=alteraendereco');
                die();
            }

            if ($usuario == null) {
                $_SESSION['mensagem'] = "Tente novamente!";
                $_SESSION['condicao'] = "erro";
                header('Location: perfil?value=alteraendereco');
                die();
            }
        } catch (\TypeError $e) {
            header('Location: perfil?value=alterausuario');
            die();
        }
    }

    protected function alteraCadastroEndereco()
    {
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

        $validarEndereco = new ValidaEnderecoService($enderecoDTO);
        $endereco = $validarEndereco->executeEndereco();

        try {
            if ($endereco != null) {
                $alterarEndereco = new EnderecoRepository();
                $alterarEnderecoExecutado = $alterarEndereco->atualizaEndereco($endereco);
            }


            if ($endereco == null) {
                $_SESSION['mensagem'] = "Tente novamente!";
                $_SESSION['condicao'] = "erro";
                header('Location: perfil?value=alteraendereco');
                die();
            }

            if ($alterarEnderecoExecutado === true) {
                $_SESSION['mensagem'] = "Cadastro alterado com sucesso!";
                $_SESSION['condicao'] = "sucesso";
                header('Location: perfil?value=alteraendereco');
                die();
            }
        } catch (\TypeError $e) {
            \App\Views\Notificador::notificar("Dados incorretos, Verifique e tente novamente!", "erro");
            die();
        }
    }
}
