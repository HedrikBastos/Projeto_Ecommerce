<?php

namespace src\Models\Service;
use src\Models\user;
use src\Config\Connection;
use TypeError;

class ValidaUsuarioService
{
    public function __construct(
        private readonly User $user
    )
    {

    }

    public function execute(): bool
    {
        try{
            $email = $this->user->email();
            $password = $this->user->senha();
            $query = Connection::conect()->prepare("SELECT u.nome, u.email FROM usuarios u INNER JOIN `senhas_usuarios` s ON u.id = s.id_usuario WHERE u.email = :email");
            $query->bindParam(':email', $email, \PDO::PARAM_STR);
            $query->execute();
            $resultado = $query->fetchAll(\PDO::FETCH_ASSOC);
        
            
            if (count($resultado) === 0) {
                return false;
            }

            return true;
           
        }catch(TypeError $e){
            return false;
        }
       
    }  

}
