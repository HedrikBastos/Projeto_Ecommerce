<?php
// Classe comum para consultas no database

namespace App\Models\Repository;

use App\Models\UserDTO;
use App\Config\Connection;

class UserRepository
{

    public function __construct(private readonly UserDTO $userDTO)
    {
    }

    public function insert()
    {
        try {

            $connection = Connection::connect();

            $name =  $this->userDTO->name;
            $sobrenome = $this->userDTO->sobrenome;
            $email = $this->userDTO->email;
            $password = password_hash($this->userDTO->password, PASSWORD_DEFAULT);

            $sql = $connection->prepare("INSERT INTO users VALUES(NULL,:NAME,:SURNAME,:EMAIL,:PASSWORD)");
            $sql->bindValue(':NAME', $name, \PDO::PARAM_STR);
            $sql->bindValue(':SURNAME', $sobrenome, \PDO::PARAM_STR);
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

            $connection = Connection::connect();

            $email = $this->userDTO->email;

            $sql = $connection->prepare("SELECT * FROM users WHERE email = :EMAIL");
            $sql->bindValue(':EMAIL', $email, \PDO::PARAM_STR);
            $sql->execute();

            return $sql;
        } catch (\Exception $e) {
            return false;
        }
    }
}
