<?php
// Classe comum para insert de usuários no database

namespace App\Models;
use App\Models\UserDTO;
use App\Models\Config\Connection;

class UserRepository
{

    public function __construct(private readonly UserDTO $UserDTO)
    {
    }

    public function insert()
    {
        try {

            $Connection = new Connection();

            $name =  $this->UserDTO->name;
            $surname = $this->UserDTO->surname;
            $email = $this->UserDTO->email;
            $password = password_hash($this->UserDTO->password, PASSWORD_DEFAULT);

            $sql = $Connection->execute()->prepare("INSERT INTO users VALUES(NULL,:NAME,:SURNAME,:EMAIL,:PASSWORD)");
            $sql->bindValue(':NAME', $name, \PDO::PARAM_STR);
            $sql->bindValue(':SURNAME', $surname, \PDO::PARAM_STR);
            $sql->bindValue(':EMAIL', $email, \PDO::PARAM_STR);
            $sql->bindValue(':PASSWORD', $password, \PDO::PARAM_STR);
            $sql->execute();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function select()
    {
        try {

            $Connection = new Connection();

            $email = $this->UserDTO->email;

            $sql = $Connection->execute()->prepare("SELECT * FROM users WHERE email = :EMAIL");
            $sql->bindValue(':EMAIL', $email, \PDO::PARAM_STR);
            $sql->execute();

            return $sql;
            
        } catch (\Exception $e) {
            return false;
        }
    }
}
