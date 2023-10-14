<?php

namespace App\Models\Service;

use App\Config\Connection;
use App\Models\User;

class CadastrarUsuarioService
{
    public function __construct(
        private readonly User $usuario
    ) {
    }

    public function execute(): bool
    {
        try {

            $nome =  $this->usuario->nome();
            $email = $this->usuario->email();
            $cpf = $this->usuario->cpf();
            $sobrenome = $this->usuario->sobrenome();
            $genero = $this->usuario->genero();
            $senha = $this->usuario->senha();

            $pdo = Connection::connect();
            $pdo->beginTransaction();

            $verificarEmail = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
            $verificarEmail->bindParam(":email", $email);
            $verificarEmail->execute();
            $emailVerificado = $verificarEmail->fetchColumn();
            if ($emailVerificado == 0) {

                $cadastraUsuario = $pdo->prepare("INSERT INTO usuarios (nome, email, cpf, sobrenome, genero)VALUES(:nome, :email, :cpf, :sobrenome, :genero)");
                $cadastraUsuario->bindParam(':nome', $nome, \PDO::PARAM_STR);
                $cadastraUsuario->bindParam(':email', $email, \PDO::PARAM_STR);
                $cadastraUsuario->bindParam(':cpf', $cpf, \PDO::PARAM_STR);
                $cadastraUsuario->bindParam(':sobrenome', $sobrenome, \PDO::PARAM_STR);
                $cadastraUsuario->bindParam(':genero', $genero, \PDO::PARAM_STR);
                $cadastraUsuario->execute();

                $ultimoIdUsuario = $pdo->lastInsertId();

                $cadastraSenha = $pdo->prepare("INSERT INTO senhas_usuarios VALUES(:id_usuario, :senha)");
                $cadastraSenha->bindParam(':id_usuario', $ultimoIdUsuario, \PDO::PARAM_INT);
                $cadastraSenha->bindParam(':senha', $senha, \PDO::PARAM_STR);
                $cadastraSenha->execute();
                $_SESSION['nome'] = $nome;
                $_SESSION['login'] = $email;

                $pdo->commit();

                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            Connection::connect()->rollBack();
            echo $e;
            return false;
        }
    }
}
