<?php

namespace App\Models\Repository;

use App\Models\User;
use App\Config\Connection;

class UserRepository
{
    public function atualizaUsuario(User $usuario): bool
    {
        try {
            $conexao = Connection::connect();
            $atualizaUsuario = $conexao->prepare("UPDATE usuarios
             SET nome = :nome, email = :email, cpf = :cpf, sobrenome = :sobrenome, genero = :genero
             WHERE id_usuario = :id_usuario");

            $atualizaUsuario->bindValue(':nome', $usuario->nome(), \PDO::PARAM_STR);
            $atualizaUsuario->bindValue(':email', $usuario->email(), \PDO::PARAM_STR);
            $atualizaUsuario->bindValue(':cpf', $usuario->cpf(), \PDO::PARAM_STR);
            $atualizaUsuario->bindValue(':sobrenome', $usuario->sobrenome(), \PDO::PARAM_STR);
            $atualizaUsuario->bindValue(':genero', $usuario->genero(), \PDO::PARAM_STR);
            $atualizaUsuario->bindValue('id_usuario', $_SESSION['id_usuario'], \PDO::PARAM_INT);
            $atualizaUsuario->execute();
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
    public function deletaUsuario($idUsuario): bool
    {
        try {
            $conexao = Connection::connect();
            $deletaUsuario = $conexao->prepare("DELETE FROM ususarios
             WHERE id_usuario =:id_usuario");
            $deletaUsuario->bindParam(':id_usuario', $idUsuario);
            $deletaUsuario->execute();
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function buscaUsuario($idUsuario): ?user
    {
        try{
            $conexao = Connection::connect();
        $buscaUsuario = $conexao->prepare("SELECT * FROM usuarios
         WHERE id_usuario =:id_usuario");
        $buscaUsuario->bindValue(':id_usuario', $idUsuario, \PDO::PARAM_INT);
        $buscaUsuario->execute();


        if ($buscaUsuario->rowCount() === 0) {
            return null;
        }
        $dadosUsuario = $buscaUsuario->fetch(\PDO::FETCH_ASSOC);

        $usuario = new User();
        $usuario->setEmail($dadosUsuario['email']);
        $usuario->setNome($dadosUsuario['nome']);
        $usuario->setSobrenome($dadosUsuario['sobrenome']);
        $usuario->setCpf($dadosUsuario['cpf']);
        $usuario->setGenero($dadosUsuario['genero']);

        return $usuario;
        }catch (\PDOException $e) {

        }
    }
}

