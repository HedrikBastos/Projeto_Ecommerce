<?php

namespace App\Models\Service;
use App\Models\User;
use App\Config\Connection;

class ValidaUsuarioService
{
    public function __construct(
        private readonly User $usuario
    ) {
    }

    public function execute(): bool
    {
        try {
            $email = $this->usuario->email();
            $senha = $this->usuario->senha();
         
            $query = Connection::connect()->prepare("SELECT u.id_usuario, u.nome, u.email, s.senha, s.contra_senha FROM usuarios u INNER JOIN `senhas_usuarios` s ON u.id_usuario = s.id_usuario WHERE u.email = :email");
            $query->bindParam(':email', $email, \PDO::PARAM_STR);
            $query->execute();
            $resultado = $query->fetch(\PDO::FETCH_ASSOC);

            if ($resultado === false) {
                return false;
            }

            if (password_verify($senha, $resultado['senha'])) {
                $_SESSION['id_usuario'] = $resultado['id_usuario'];
                $_SESSION['login'] = $resultado['email'];
                $_SESSION['nome'] = $resultado['nome'];
                return true;
            }

            
        } catch (\PDOException $e) {
            return false;
            
        }
    }
}
