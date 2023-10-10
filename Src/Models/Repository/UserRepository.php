<?php
// Classe comum para consultas no database

namespace Src\Models\Repository;
use Src\Models\UserDTO;
use Src\Config\Connection;

class UserRepository
{

    public function __construct(private readonly UserDTO $userDTO)
    {
    }

    public function insert()
    {
        try {

            $connection = Connection::conect();

            $name =  $this->userDTO->name;
            
            $email = $this->userDTO->email;
            $password = password_hash($this->userDTO->password, PASSWORD_DEFAULT);

            $sql = $connection->prepare("INSERT INTO users VALUES(NULL,:NAME,:SURNAME,:EMAIL,:PASSWORD)");
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

            $connection = Connection::conect();

            $email = $this->userDTO->email;

            $sql = $connection->execute()->prepare("SELECT * FROM users WHERE email = :EMAIL");
            $sql->bindValue(':EMAIL', $email, \PDO::PARAM_STR);
            $sql->execute();

            return $sql;
            
        } catch (\Exception $e) {
            return false;
        }
    }
}
