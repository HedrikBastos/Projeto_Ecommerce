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
            $confirmarSenha,
            $_SESSION['contra_senha']
        );

        $validarUsuario = new ValidaCadastroService($usuarioDTO);
        $usuario = $validarUsuario->execute();

        try {
            if ($usuario != null) {
                $alterarUsuario = new UserRepository();
                $alterarUsuarioExecutado = $alterarUsuario->atualizaUsuario($usuario);
            }

            if (isset($alterarUsuarioExecutado) === true) {
               
                if(isset($_SESSION['contra_senha'])) {
                    \App\Views\MainView::renderizar('login');
                    \App\Views\Notificador::notificar("Cadastro alterado com sucesso!", "sucesso");
                    die();
                }
                \App\Views\MainView::renderizar('perfil');
                \App\Views\Notificador::notificar("Cadastro alterado com sucesso!", "sucesso");
                die();
            }

            if ($usuario == null) {
                \App\Views\MainView::renderizar('perfil');
                \App\Views\Notificador::notificar("Dados incorretos, Verifique e tente novamente!", "erro");

                die();
            }
        } catch (\TypeError $e) {
            \App\Views\Notificador::notificar("Falha ao alterar cadastro", "erro");
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
                $alterarEnderecoEXecutado = $alterarEndereco->autualizaEndereco($endereco);
            }

            if (isset($alterarEnderecoEXecutado) === true) {
                \App\Views\MainView::renderizar('perfil');
                \App\Views\Notificador::notificar("Cadastro alterado com sucesso!", "sucesso");
                die();
            }

            if ($endereco == null) {
                \App\Views\MainView::renderizar('perfil');
                \App\Views\Notificador::notificar("Dados incorretos, Verifique e tente novamente!", "erro");
                die();
            }
        } catch (\TypeError $e) {
        }
    }
}
