<?php

namespace App\Models\Service;

use App\Models\User;
use App\Config\Connection;

class AlteraSenhaService
{
    public function __construct(
        private readonly User $usuario
    ) {
    }

    public function execute(): bool
    {
        try {
            $conexao = Connection::connect();
            $conexao->beginTransaction();

            $alteraSenha =  $conexao->prepare("UPDATE senhas_usuarios SET senha = :senha WHERE id_usuario = :id_usuario");
            $alteraSenha->bindValue(':senha', $this->usuario->senha(), \PDO::PARAM_STR);
            $alteraSenha->bindValue(':id_usuario', $_SESSION['id_usuario'], \PDO::PARAM_INT);
            $alteraSenha->execute();

            $conexao->commit();

            return true;

        } catch (\PDOException $e) {
            Connection::connect()->rollBack();
            return false;
        }
    }
}
