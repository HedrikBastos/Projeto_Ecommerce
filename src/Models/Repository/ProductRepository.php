<?php

namespace App\Models\Repository;
use App\Models\Config\Connection;

class ProductRepository
{

    public function select() {
        
        $connection = Connection::execute();
        $sql = $connection->prepare("SELECT * FROM products");
        $sql->execute();
       
        return $sql;
       
    }

}
