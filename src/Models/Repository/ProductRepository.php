<?php

namespace src\Models\Repository;
use src\Config\Connection;

class ProductRepository
{

    public function select() {
        
        $connection = Connection::conect();
        $sql = $connection->prepare("SELECT * FROM products");
        $sql->execute();
       
        return $sql;
       
    }

}
