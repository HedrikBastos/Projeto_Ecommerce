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
        if (isset($_POST['acao']) && isset($_POST['cadastrousuario'])) {
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
            $confirmarSenha
        );

        $validarUsuario = new ValidaCadastroService($usuarioDTO);
        $usuario = $validarUsuario->execute();
        

        try {
            if ($usuario != null) {
                $alterarUsuario = new UserRepository();
                $alterarUsuarioExecutado = $alterarUsuario->atualizaUsuario($usuario);
              
            }
            if (isset($alterarUsuarioExecutado) === true) {
                header("Location:perfil?value=alterausuario");
                die();
            }
        } catch (\TypeError $e) {
            echo 'falha ao alterar cadastro';
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

        try{
            if($endereco != null){
                $alterarEndereco = new EnderecoRepository();
                $alterarEnderecoEXecutado = $alterarEndereco->autualizaEndereco($endereco);
            }

            if(isset($alterarEnderecoEXecutado) === true){
                header("Location:perfil?value=alteraendereco");
                die();
            }
        }catch (\TypeError $e){

        }

    }
}
