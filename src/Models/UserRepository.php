<?php
// Classe comum para insert de usuários no database

namespace App\Models;
use App\Models\UserDTO;
use App\Models\Config\Connection;

class UserReposity{

    public function __construct(private readonly UserDTO $UserDTO)
    {
        
    }

    public function insert(){
        try{

            $Connection = new Connection();
            
            $name =  $this->UserDTO->name;
            $email = $this->UserDTO->email;
            $password = $this->UserDTO->password;

            $sql  = $Connection->execute()->prepare("INSERT INTO users VALUES(NULL,:NAME,:EMAIL,:PASSWORD");
            $sql->bindValue(':NAME',$name,\PDO::PARAM_STR);
            $sql->bindValue(':EMAIL',$email,\PDO::PARAM_STR);
            $sql->bindValue(':EMAIL',$password,\PDO::PARAM_STR);
            $sql->execute();

        }catch(\Exception $e){
            return false;
        }
      
        return true;
        
    }


}