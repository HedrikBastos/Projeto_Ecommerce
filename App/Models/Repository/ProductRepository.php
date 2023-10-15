<?php

namespace App\Models\Repository;

use App\Config\Connection;

class ProductRepository
{

    public static function select()
    {

        $connection = Connection::connect();
        $sql = $connection->prepare("SELECT * FROM produtos");
        $sql->execute();

        return $sql;
    }
}
