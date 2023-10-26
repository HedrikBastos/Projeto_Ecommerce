<?php

namespace App\Controllers;
use App\DTOs\UserDTO;
use App\Models\Repository\UserRepository;
use App\Models\User;

class UsuarioController
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
        }
    }

}
