<?php

namespace App\Models\Repository;

use App\Config\Connection;
use App\Models\Produto;

class ProductRepository
{
    public function __construct(
        private readonly Produto $produto
    ) {
    }

    public static function selectProdutos()
    {
        $connection = Connection::connect();
        $sql = $connection->prepare("SELECT * FROM produtos");
        $sql->execute();
        $result = $sql->fetchAll();

        return $result;
    }

    public function execute()
    {
        $name = $this->produto->nome();
        $preco = $this->produto->preco();
        $categoria = $this->produto->categoria();
        $path = $this->produto->path();

        $connection= Connection::connect();

        $sql = $connection->prepare("INSERT INTO produtos VALUES(NULL,:NAME,:PRECO,:CATEGORIA,:PATH)");
        $sql->bindValue(':NAME', $name, \PDO::PARAM_STR);
        $sql->bindValue(':PRECO', $preco, \PDO::PARAM_INT);
        $sql->bindValue(':CATEGORIA', $categoria, \PDO::PARAM_STR);
        $sql->bindValue(':PATH', $path, \PDO::PARAM_STR);
        $sql->execute();
    }
}
