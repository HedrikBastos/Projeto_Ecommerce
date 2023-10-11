<?php

namespace App\Models\Repository;
use App\Config\Connection;

class ProductRepository
{

    public function select() {
        
        $connection = Connection::connect();
        $sql = $connection->prepare("SELECT * FROM products");
        $sql->execute();
       
        return $sql;
       
    }

}
