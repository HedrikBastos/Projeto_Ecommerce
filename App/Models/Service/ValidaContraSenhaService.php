<?php

namespace App\Models\Service;
use App\Models\User;
use App\Config\Connection;
class ValidaContraSenhaService
{
    public function __construct(
        private readonly User $usuario
    ) {
    }

    public function execute(): bool
    {
        try {
            $email = $this->usuario->email();
            
            $contraSenha = $this->usuario->contraSenha();
            
            $query = Connection::connect()->prepare("SELECT u.id_usuario, u.email, s.contra_senha FROM usuarios u INNER JOIN `senhas_usuarios` s ON u.id_usuario = s.id_usuario WHERE u.email = :email");
            $query->bindParam(':email', $email, \PDO::PARAM_STR);
            $query->execute();
            $resultado = $query->fetch(\PDO::FETCH_ASSOC);

            if ($resultado === false) {
                return false;
            }

            if ($contraSenha == $resultado['contra_senha']) {
                $_SESSION['id_usuario'] = $resultado['id_usuario'];
                $_SESSION['contra_senha'] = $resultado['contra_senha'];
                return true;
            }
        } catch (\PDOException $e) {
            return false;
        }
    }
}
