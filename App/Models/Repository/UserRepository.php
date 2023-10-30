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

            $atualizaUsuario->bindParam(':nome', $usuario->nome(), \PDO::PARAM_STR);
            $atualizaUsuario->bindParam(':email', $usuario->email(), \PDO::PARAM_STR);
            $atualizaUsuario->bindParam(':cpf', $usuario->cpf(), \PDO::PARAM_STR);
            $atualizaUsuario->bindParam(':sobrenome', $usuario->sobrenome(), \PDO::PARAM_STR);
            $atualizaUsuario->bindParam(':genero', $usuario->genero(), \PDO::PARAM_STR);
            $atualizaUsuario->bindParam('id_usuario', $_SESSION['id_usuario'], \PDO::PARAM_INT);
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

    public function buscaUsuario($idUsuario)
    {
        $conexao = Connection::connect();
        $buscaUsuario = $conexao->prepare("SELECT * FROM usuarios
         WHERE id_usuario =:id_usuario");
        $buscaUsuario->bindParam(':id_usuario', $idUsuario, \PDO::PARAM_INT);
        $buscaUsuario->execute();
        $usuario = $buscaUsuario->fetch(\PDO::FETCH_ASSOC);

        return $usuario;
    }
}

