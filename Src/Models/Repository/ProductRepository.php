<?php

namespace Src\Models\Repository;
use Src\Config\Connection;

class ProductRepository
{

    public function select() {
        
        $connection = Connection::conect();
        $sql = $connection->prepare("SELECT * FROM products");
        $sql->execute();
       
        return $sql;
       
    }

}
