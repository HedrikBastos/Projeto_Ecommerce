<?php

namespace App\Models\Service;
use App\Models\user;
use App\Config\Connection;
use TypeError;

class ValidaUsuarioService
{
    public function __construct(
        private readonly User $user
    )
    {

    }

    public function execute(): bool | array
    {
        try{
            $email = $this->user->email();
            $password = $this->user->senha();
            $query = Connection::connect()->prepare("SELECT u.nome, u.email FROM usuarios u INNER JOIN `senhas_usuarios` s ON u.id = s.id_usuario WHERE u.email = :email");
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
